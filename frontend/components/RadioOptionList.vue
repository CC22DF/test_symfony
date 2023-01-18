<template>
    <div>
        <div class="dropdown">
            <button class="btn-dp" @click="toggleDropdown">
                <p class="title_dropdown">{{ title_dropdown }} </p>
                <img :class="[isDropdownOpen ? 'down' : 'up']" src="../assets/img/down.png" />
            </button>
            <transition name="fade">
                <div class="dropdown-content" v-if="isDropdownOpen">
                    <label class="label-radio-button " :class="{ 'checked': selectedOption === option.value }"
                        v-for="(option, index) in options" :key="index">
                        <input type="radio" :value="option.value" v-model="selectedOption"> {{ option.text }}
                    </label>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title_dropdown: {
            type: String,
            required: true
        },
        options: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            selectedOption: '',
            isDropdownOpen: false,
        }
    },
    methods: {
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen
        }
    }
}
</script>

<style>
.label-radio-button {
    padding-bottom: 10px;
    color: #18495c;
}

.title_dropdown {
    color: #18495c;
    font-weight: 700;
    font-size: 20px;
}

.dropdown-content {
    display: flex;
    flex-direction: column;
}

.btn-dp {
    background-color: rgba(255, 255, 255, 0);
    border: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.down {
    width: 15px;
    transform: rotate(3.14159rad);

}

.up {
    width: 15px;
    transform: rotate(0);

}

.fade-enter-active,
.fade-leave-active {
    transition: opacity .5s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.checked {
    font-weight: bold;
}
</style>
