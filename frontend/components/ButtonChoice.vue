<template>
    <div class="btn-choice">
        <p class="t-btn-choice">Budget</p>
        <div class="btn-style">
            <div ref="section1" class="section1" @click="changeColor">
                <p v-text="section1Text"></p>
            </div>
            <div ref="section2" class="section2" @click="changeColor">
                <p v-text="section2Text"></p>
            </div>
        </div>
    </div>

</template>
  
<script>
export default {
    data() {
        return {

            section1Text: 'Tout',
            section2Text: 'Mensuel',
        }
    },
    mounted() {
        this.changeColor(this.$refs.section1);
    },
    methods: {
        changeColor(event) {
            let clickedSection = event.currentTarget;
            if (clickedSection === this.$refs.section2) {
                this.$refs.section2.style.backgroundColor = "#18495c";
                this.$refs.section1.style.backgroundColor = "white";
                this.$refs.section2.style.color = "white";
                this.$refs.section1.style.color = "#18495c";

            } else {
                this.$refs.section1.style.backgroundColor = "#18495c";
                this.$refs.section2.style.backgroundColor = "white";
                this.$refs.section1.style.color = "white";
                this.$refs.section2.style.color = "#18495c";
            }
        }
    }
};
</script>

  
<style>
.btn-choice{
    margin-bottom: 10px;
}
.t-btn-choice{
    color: #18495c;
    font-weight: 800;
    font-size: larger;
}
.btn-style {
    cursor: pointer;
    background-color: #18495c;
    display: flex;
    height: 50px;
    width: 200px;
    border: 2px solid #18495c;
    border-radius: 10px;

}

.section1 {
    text-align: center;
    border-radius: 10px 0px 0px 10px;
    width: 50%;
    height: 100%;
}

.section2 {
    border-radius: 0px 10px 10px 0px;
    text-align: center;
    width: 50%;
    height: 100%;
}
</style>
