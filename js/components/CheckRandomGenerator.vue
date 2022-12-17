<template>
    <div class="diagram">
        <div v-for="(column, index) in diagram"
             :key="index"
             class="column"
             :style="{height: `${column / n * 1000}%`}"
        ></div>
    </div>
</template>

<script lang="ts">
    import {Component, Prop, Vue} from "vue-property-decorator";

    @Component
    export default class CheckRandomGenerator extends Vue {
        @Prop() n!: number;

        diagram = [];
        columnsCount = 20;
        randomBorder = 1000;

        mounted() {
            this.diagram = [];

            for (let i = 0; i < this.columnsCount; i++) {
                this.diagram.push(0);
            }

            this.check(this.n);
        }

        check(n) {
            for (let i = 0; i < n; i++) {
                const x = Math.random() * this.randomBorder;
                const d = this.randomBorder / this.columnsCount;
                const j = Math.trunc(x/d);
                this.diagram[j]++;
            }
        }
    }
</script>

<style scoped>
.diagram {
    height: 300px;
    border: 1px solid #000;
    border-top: none;
    border-right: none;
    display: flex;
    align-items: flex-end;
}

.column {
    border: 1px solid #000;
    background: #2c67a2;
    width: 25px;
}
</style>