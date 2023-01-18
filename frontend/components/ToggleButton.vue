<template>
    <div :class="[isToggled ? 'on' : 'off']" class="toggle-button">
        <div>
            <p>{{ text_button }}</p>
        </div>
        <div>
            <label class="switch">
                <input @click="toggle" type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
    </div>
</template>

<script lang="ts">
import { Vue, Prop } from 'vue-property-decorator'

export default class ToggleButton extends Vue {
    @Prop() text_button!: string

    isToggled = false;

    toggle() {
        this.isToggled = !this.isToggled
    }
}
</script>

<style>
.on {
    background-color: #18495c;
    color: white;
}

.off {
    background-color: #8e979a;
    color: white;
}

.toggle-button {
    font-family: Arial, Helvetica, sans-serif;

    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 10px;
    padding-left: 15px;
    padding-right: 15px;
}

.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background-color: #2e6479;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2e6479;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>
