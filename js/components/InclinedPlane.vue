<template>
    <div class="">
        <div class="triangle"
             :style="{
                 width: l + 'px',
                 'border-bottom': h + 'px solid currentColor',
                 'border-right': l + 'px solid transparent',
             }"
        >
            <div class="block"
                 :style="{
                     width: blockLength+ 'px',
                     height: blockHeight + 'px',
                     left: firstX + 'px',
                     bottom: - firstY + 'px',
                     rotate: alpha + 'rad',
                 }"
            ></div>

            <div class="block block--second"
                 :style="{
                     width: blockLength+ 'px',
                     height: blockHeight + 'px',
                     left: secondX + 'px',
                     bottom: - secondY + 'px',
                     rotate: alpha + 'rad',
                 }"
            ></div>
        </div>
        <button class="mt-3 w-25" @click="start">
            Старт
        </button>
    </div>
</template>

<script lang="ts">
    import {Component, Vue} from "vue-property-decorator";

    const g = 9.8;

    @Component
    export default class InclinedPlane extends Vue {
        h      = 200;
        alpha  = 15;
        initDx = 100;
        dx     = this.initDx;
        dt     = 0.3;

        m1  = 3;
        mu1 = 0.2;
        m2  = 1;
        mu2 = 0.1;

        l = 0;

        x1 = 0;
        x2 = 0;
        v1 = 0;

        blockHeight = 20;
        blockLength = 40;

        firstIntervalId: NodeJS.Timer = null;
        secondIntervalId: NodeJS.Timer = null;
        commonIntervalId: NodeJS.Timer = null;

        mounted() {
            this.alpha = this.alpha * Math.PI / 180
            this.l = this.h / Math.tan(this.alpha)
        }

        get firstX() {
            return this.x1 * Math.cos(this.alpha);
        }

        get firstY() {
            return this.x1 * Math.sin(this.alpha);
        }

        get secondX() {
            return (this.x2 + this.dx) * Math.cos(this.alpha);
        }

        get secondY() {
            return (this.x2 + this.dx) * Math.sin(this.alpha);
        }

        start() {
            clearInterval(this.firstIntervalId);
            clearInterval(this.secondIntervalId);
            clearInterval(this.commonIntervalId);
            let tick = 20;
            this.x1 = 0;
            this.x2 = 0;
            this.dx = this.initDx;

            // первый блок
            const a1 = g * (Math.sin(this.alpha) - this.mu1 * Math.cos(this.alpha))

            if (a1 > 0) {
                this.v1 = 0;

                this.firstIntervalId = setInterval(() => {
                    this.x1 = this.x1 + this.v1 * this.dt + a1 * (this.dt ** 2) / 2;
                    this.v1 = this.v1 + a1 * this.dt;

                    if (this.firstY > this.h - this.blockLength * Math.sin(this.alpha)) {
                        clearInterval(this.firstIntervalId);
                    }
                }, tick)
            } else {
                console.log(a1, 'отрицательная скорость');
            }

            // второй блок
            const a2 = g * (Math.sin(this.alpha) - this.mu2 * Math.cos(this.alpha))

            if (a2 > 0) {
                let v = 0;

                this.secondIntervalId = setInterval(() => {
                    this.x2 = this.x2 + v * this.dt + a2 * (this.dt ** 2) / 2;
                    v = v + a2 * this.dt;

                    if (this.secondY > this.h - this.blockLength * Math.sin(this.alpha)) {
                        clearInterval(this.secondIntervalId);
                    }
                }, tick)
            } else {
                console.log(a2, 'отрицательная скорость');
            }

            // соприкосновение блоков
            this.commonIntervalId = setInterval(() => {
                if (this.x1 + this.blockLength >= this.x2 + this.dx) {
                    let a12 = -g * (Math.sin(this.alpha) - Math.cos(this.alpha)) *
                        (this.mu1 * this.m1 + this.mu2 * this.m2) / (this.m1 + this.m2);

                    clearInterval(this.firstIntervalId);
                    clearInterval(this.secondIntervalId);
                    clearInterval(this.commonIntervalId);

                    let x = this.x1;
                    let v = this.v1;
                    this.x2 = this.x1;

                    this.dx = this.blockLength;

                    this.commonIntervalId = setInterval(() => {
                        x = x + v * this.dt + a12 * (this.dt ** 2) / 2;
                        v = v + a12 * this.dt;

                        this.x1 = x;
                        this.x2 = x;

                        if (this.secondY > this.h - this.blockLength * Math.sin(this.alpha)) {
                            clearInterval(this.commonIntervalId);
                        }
                    }, tick)
                }
            }, 10)
        }
    }
</script>

<style scoped>
.triangle {
    position: relative;
    height: 0;
    color: #7aadbe;
}

.block {
    position: absolute;
    background: #022f81;
    border: 1px solid #000;
    transform-origin: bottom left;
}

.block--second {
    background: #e80c0c;
}
</style>