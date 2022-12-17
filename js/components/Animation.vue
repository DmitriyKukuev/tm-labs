<template>
    <div class="">
        <div class="area"
             :style="{
                 width: a + b + 'px',
                 'border-top': b + 'px solid currentColor',
                 'border-right': b + 'px solid transparent',
             }"
        >
            <div class="ball"
                 :style="{
                     width: r * 2 + 'px',
                     height: r * 2 + 'px',
                     left: x - r + 'px',
                     bottom: y - r + 'px',
                 }"
            ></div>
        </div>
        <button class="mt-3 w-25" @click="start">
            Старт
        </button>

        <button class="mt-3 w-25" @click="stop">
            Стоп
        </button>
    </div>
</template>

<script lang="ts">
    import {Component, Vue} from "vue-property-decorator";

    @Component
    export default class Animation extends Vue {
        x0: number  = 100;
        y0: number  = 100;
        r: number   = 10;
        a: number   = 300;
        b: number   = 300;

        x: number = this.x0;
        y: number = this.y0;

        intervalId: NodeJS.Timer = null;

        start() {
            this.x = this.x0;
            this.y = this.y0;

            let dx = Math.floor(Math.random() * 5);
            let dy = Math.floor(Math.random() * 5);
            let kof = 0.95;

            clearInterval(this.intervalId);

            this.intervalId = setInterval(() => {
                dy -= 0.5;

                if (this.x - this.r + dx <= 0) {
                    dx = -(kof * dx);
                }

                if (
                    this.y + this.r + dy >= this.b
                    || this.y - this.r + dy <= 0
                ) {
                    dy = -(kof * dy);
                }

                if (this.y - this.r < this.x - this.a) {
                    [dx, dy] = [kof * dy, kof * dx]
                }

                this.x = this.x + dx;
                this.y = this.y + dy;
            }, 20)
        }

        stop() {
            clearInterval(this.intervalId);

            this.x = this.x0;
            this.y = this.y0;
        }
    }
</script>

<style scoped>
.area {
    position: relative;
    height: 0;
    color: #7aadbe;
}

.ball {
    position: absolute;
    background: #f00;
    border: 1px solid #000;
    border-radius: 50%;
}
</style>