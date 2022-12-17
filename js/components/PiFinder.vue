<template>
    <div>
        <div class="graph">
            <div class="pi">
                <div>3.14</div>
                <div class="line"></div>
            </div>

            <div v-for="(point, index) in pi"
                 :key="index"
                 class="point"
                 :style="{
                     left: index * 700/pi.length + 'px',
                     bottom: point * 100 + 'px',
                 }"
            ></div>
        </div>

        <div>pi = {{pi.at(-1)}}</div>
        <div>n = <input type="number" v-model="n"></div>
        <button @click="find">посчитать pi</button>
    </div>
</template>

<script lang="ts">
    import {Component, Vue} from "vue-property-decorator";

    @Component
    export default class PiFinder extends Vue {
        n = 250;

        a = 1000;

        pi = [];

        mounted() {
            this.find();
        }

        find() {
            this.pi = [];
            let m = 0;
            const b = this.a ** 2;

            for (let i = 0; i < this.n; i++) {
                const x = Math.random() * this.a;
                const y = Math.random() * this.a;
                const r = x ** 2 + y ** 2;

                if (r < b) {
                    m++;
                }
                this.pi.push(4 * m / i);
            }
        }
    }
</script>

<style scoped>
.graph {
    height: 400px;
    border: 1px solid #000;
    border-top: none;
    border-right: none;
    position: relative;
}

.point {
    width: 3px;
    height: 3px;
    background: #2c67a2;
    position: absolute;
    border-radius: 50%;
}

.pi {
    display: flex;
    gap: 10px;
    align-items: center;
    position: absolute;
    width: calc(100% + 40px);
    left: -40px;
    bottom: 314px;
}

.pi .line {
    width: 100%;
    height: 2px;
    background: #4da40f
}
</style>