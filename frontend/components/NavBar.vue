<template>
    <div class="nav-bar">
        <div class="sec-2">
            <div class="result">
                <p class="result-cont">{{ result }} résultats </p>
                <p>correspond à votre recherche</p>
            </div>
            <div class="sec-1">
                <p>Trier par</p>
                <select class="slc-options">
                    <option>Pertinence</option>
                    <!-- <option>option2</option>
                    <option>option3</option>
                    <option>option4</option> -->
                </select>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { Vue, Prop } from 'vue-property-decorator'

export default class NavBar extends Vue {
    @Prop()
    result!: number
}
</script>
<style>
select {
    color: #18495c;
    border: none;
    border-radius: 5px;
    height: 40px;
    width: 200px;
    background-color: #ccc;
}

.sec-1 {

    /* width: 50%; */
    display: flex;
    align-items: center;

    gap: 5px;
}

.result-cont {
    font-weight: 800;
}

.result {
    gap: 5px;
    display: flex;
    align-items: center;
    width: 50%;
    display: flex;
}

.sec-2 {
    width: 100%;
    display: flex;
    justify-content: space-between;
}

.nav-bar {
    color: #18495c;
    display: flex;
    justify-items: center;
    justify-content: center;
}

/* .title {
    align-items: center;
    width: 300px !important;
    font-weight: 800;
} */
@media (max-width: 768px) {
    .nav-bar {
        margin-top: 80px;
    }

    .sec-2,
    .nav-bar {
        flex-direction: column;
        align-items: center;
    }

    .result {
        justify-content: center;
        width: 100%;
    }

    .title {
        display: none;
    }
}
</style>