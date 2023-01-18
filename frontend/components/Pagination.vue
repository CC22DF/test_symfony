<template>
    <div class="pagination">
        <button @click="changePage(currentPage - 1)" :disabled="currentPage === 1">Précédent</button>
        <span class="currentPage">{{currentPage }}</span>
        <button @click="changePage(currentPage + 1)" :disabled="currentPage === pages.length">Suivant</button>
    </div>
</template>
<script>
export default {
    props: {
        currentPage: {
            type: Number,
            required: true
        },
        totalCards: {
            type: Number,
            required: true
        },
        cardsPerPage: {
            type: Number,
            required: true
        }
    },
    computed: {
        pages() {
            return Array.from({ length: Math.ceil(this.totalCards / this.cardsPerPage) }, (_, i) => i + 1);
        }
    },
    methods: {
        changePage(page) {
            this.$emit('change-page', page)
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.$emit('change-page', this.currentPage - 1)
            }
        },
        nextPage() {
            if (this.currentPage < this.pages.length) {
                this.$emit('change-page', this.currentPage + 1)
            }
        }
    }
}
</script>


<style>
.currentPage{
    text-align: center;
   
    font-weight: bold;
}
.pagination {
    gap:calc(20%);
    color:#18495c;
    display: flex;
    justify-content: center;
    align-items: center;
}

.pagination button {
    color:white;
    font-weight:700;
    padding: 10px 20px;
    background-color: #18495c;
    border: none;
    border-radius: 5px;
    margin: 0 5px;
    cursor: pointer;
}

.pagination button.active {
    background-color: #ddd;
}
</style>
