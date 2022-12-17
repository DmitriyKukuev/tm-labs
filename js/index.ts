import initVue from "./init-vue";
import "../css/styles.less"
import Animation from "./components/Animation.vue";
import InclinedPlane from "./components/InclinedPlane.vue";
import CheckRandomGenerator from "./components/CheckRandomGenerator.vue";
import PiFinder from "./components/PiFinder.vue";

window.onload = () => {
    initVue(document.querySelector('.vue-animation'), Animation);
    initVue(document.querySelector('.vue-inclined-plane'), InclinedPlane);
    initVue(document.querySelector('.vue-check-random-generator1'), CheckRandomGenerator);
    initVue(document.querySelector('.vue-check-random-generator2'), CheckRandomGenerator);
    initVue(document.querySelector('.vue-check-random-generator3'), CheckRandomGenerator);
    initVue(document.querySelector('.vue-pi-finder'), PiFinder);
}