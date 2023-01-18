<template>

    <div style="display:flex;flex-direction: column;">

        <div class="t-btn-menu">
            <div>
                <img :class="[isOpen ? 'down-icon' : 'up-icon']" @click="toggleMenu"
                    src="../assets/img/icon-menu.png" />
            </div>

            <div class="title-sb">
                <p>FILTRE MA RECHERCHE</p>
            </div>
        </div>
        <div>
            <nav :class="[isOpen ? 'SlidOff' : 'SlidOn']">
                <div class='title-side-bare'>
                    <p>FILTRE MA RECHERCHE</p>
                </div>
                <div>
                    <ul>
                        <li>
                            <ToggleButton v-for="item in titles" :text_button="item.title_1" />
                        </li>
                        <li>
                            <ToggleButton v-for="item in titles" :text_button="item.title_2" />
                        </li>
                        <li>
                            <ToggleButton v-for="item in titles" :text_button="item.title_3" />
                        </li>
                        <li>
                            <ButtonChoice />
                        </li>
                        <li class="lline">
                            <PriceSlider />
                        </li>
                        <li class="lline">
                            <RadioOptionList v-for="item in title_dropdown" :title_dropdown="item.title_dropdown_1"
                                :options="marques" v-model="selectedOption" />
                        </li>
                        <li class="lline">
                            <RadioOptionList v-for="item in title_dropdown" :title_dropdown="item.title_dropdown_2"
                                :options="TOM" v-model="selectedOption" />
                        </li>
                        <li class="lline">
                            <RadioOptionList v-for="item in title_dropdown" :title_dropdown="item.title_dropdown_3"
                                :options="models" v-model="selectedOption" />
                        </li>
                    </ul>
                </div>


            </nav>
        </div>
    </div>

</template>

<script  lang="ts">
import RadioOptionList from './RadioOptionList.vue'
import ToggleButton from './ToggleButton.vue';
import ButtonChoice from './ButtonChoice.vue';
import PriceSlider from './PriceSlider.vue';




export default {
    components: {
        ToggleButton,
        ButtonChoice,
        PriceSlider,
        RadioOptionList


    }, data() {

        return {
            title_dropdown: [{
                title_dropdown_1: 'Marque',
                title_dropdown_2: 'Type de véhicule',
                title_dropdown_3: 'Modèle',
            }],
            marques: [
                { text: 'Toutes', value: 'toutes' },
                { text: 'Dacia', value: 'dacia' },
                { text: 'Nissan', value: 'nissan' },
                { text: 'Renault', value: 'renault' },
            ],
            TOM: [
                { text: 'Tous', value: 'tous' },
                { text: 'Citadine', value: 'citadine' },
                { text: 'Berline', value: 'berline' },
                { text: 'Break', value: 'break' },
                { text: 'SUV/4x4', value: 'suv/4x4' },
                { text: 'Monospace/Ludospace', value: 'monospace/ludospace' },
                { text: 'Coupe/Cabriolet', value: 'coupe/cabriolet' },
            ],
            models: [
                { text: 'Tous', value: 'tous' },
                { text: 'Puma', value: 'puma' },
                { text: 'Duster', value: 'duster' },
                { text: 'Sx4 S-cross', value: 'sx4 s-cross' },
            ],
            selectedOption: '',
            titles: [{
                title_1: 'Prêt à partir',
                title_2: 'Zéro Km',
                title_3: 'Promotions',
            }],
            isOpen: false
        }
    },
    methods: {
        toggleMenu() {
            this.isOpen = !this.isOpen
        }
    }
}
</script>

<style>
.title-side-bare {
    color: #18495c;
    padding: 0px;
    display: flex;
    justify-content: center;
    width: 300px !important;
    font-weight: 800;
    font-size: 22px;

}

.t-btn-menu {
    position: absolute;
    width: 300px;
    top: 0;
    left: 0;
    display: flex;
    padding: 20px;
    transform: translateX(-1000%);

}

@media (max-width: 980px) {
    .t-btn-menu {
        transform: translateX(0);
    }
}

.title-sb {
    color: #18495c;
    font-weight: 900;
    width: 100%;
    text-align: center;
}

nav {
    width: 100vw;
    background-color: rgb(255, 255, 255);
    padding-top: 0px !important;
    /* padding: 20px; */
    width: 100%;
    top: 0;
    left: 0;
    transition: transform 0.3s ease-in-out;
}

nav.is-open {
    transform: translateX(0);
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.lline {
    border-bottom: 1px solid #ccc;
}

nav li {
    padding: 10px;
}

nav a {
    text-decoration: none;
    color: #333;
}

@media (max-width:980px) and (min-width: 768px) {
    nav {
        margin-top: 90px;
    }

    .SlidOn {
        display: none;
    }

    .SlidOff {
        transform: translateX(0);
    }
}

@media (max-width: 768px) {
    .SlidOn {

        transform: translateX(-100%);
    }

    .SlidOff {
        transform: translateX(0);
    }

    .t-btn-menu {
        transform: translateX(0);

    }

    nav {
        margin-top: 60px;
    }

    .down-icon {
        transform: rotate(90deg);

    }

    .up-icon {
        transform: rotate(0);

    }

    .title-side-bare {
        display: none;
    }
}
</style>
