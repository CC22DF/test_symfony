<template>
  <div id="app-vue">
<!-- 
    <div class="t-btn-menu">
      <div>
        <img @click="toggleMenu" src="./assets/img/icon-menu.png" />
      </div>

    </div> -->

    <div class="app">
      <div class="side-bar">
        <SidebarMenu />
      </div>
      <div class="container">
        <div class="nvbar">
          <NavBar v-for="item in results" :result="item.result" />
        </div>
        <div class="cards">     

          <Card v-for="item in filteredItems" :key="item.title" :image="item.image" :title="item.title" :brand="item.brand"
            :model="item.model" :version="item.version" :year="item.year" :mileage="item.mileage" :energy="item.energy"
            :price="item.price" :price_retail="item.price_retail" :price_monthly="item.price_monthly"
            :percentage="item.percentage" />
        </div>
        <div class="pagination">
          <pagination :current-page="currentPage" :total-cards="totalCards" :cards-per-page="cardsPerPage" @change-page="updateCurrentPage"></pagination>
        </div>
      </div>
    </div>
    <div>
    </div>
  </div>

</template>

<script  lang="ts">
import pagination from './components/pagination.vue'
import axios from 'axios'
import SidebarMenu from './components/SidebarMenu.vue'
import Card from './components/Card.vue'
import NavBar from './components/NavBar.vue';


export default {

  data() {

    return {
      currentPage: 1,
            totalCards: 100,
            cardsPerPage: 12,
      vehicles: [] as any[],
      results: [{
        result: 100,
      }],
      items: [
        {
          image: 'https://www.pngmart.com/files/10/Toyota-Camry-Transparent-PNG.png',
          title: '2022 Toyota Camry',
          brand: 'Toyota',
          model: "Camry",
          version: "SE",
          year: "2022",
          mileage: 10,
          energy: "Gasoline",
          price: 25000,
          price_retail: 27000,
          price_monthly: 400,
          percentage: -7
        }, 
        {
          image: 'https://www.pngmart.com/files/10/Black-Ford-Mustang-PNG-Transparent-Image.png',
          title: '2021 Ford Mustang',
          brand: 'Ford',
          model: "Mustang",
          version: "GT",
          year: "2021",
          mileage: 15,
          energy: "Gasoline",
          price: 35000,
          price_retail: 38000,
          price_monthly: 550,
          percentage: -8
        }, 
        {
          image: 'https://www.pngmart.com/files/4/Chevrolet-Camaro-PNG-Transparent.png',
          title: '2021 Chevrolet Camaro',
          brand: 'Chevrolet',
          model: "Camaro",
          version: "RS",
          year: "2021",
          mileage: 20,
          energy: "Gasoline",
          price: 40000,
          price_retail: 42000,
          price_monthly: 600,
          percentage: -5
        }, 
        {
          image: 'https://www.pngmart.com/files/1/Volkswagen-PNG-HD.png',
          title: '2021 Volkswagen Jetta',
          brand: 'Volkswagen',
          model: "Jetta",
          version: "SEL",
          year: "2021",
          mileage: 25,
          energy: "Gasoline",
          price: 22000,
          price_retail: 24000,
          price_monthly: 450,
          percentage: -8
        }, 
        {
          image: 'https://www.pngmart.com/files/4/Honda-Civic-Transparent-Background.png',
          title: '2021 Honda Civic',
          brand: 'Honda',
          model: "Civic",
          version: "EX",
          year: "2021",
          mileage: 30,
          energy: "Gasoline",
          price: 20000,
          price_retail: 22000,
          price_monthly: 400,
          percentage: -9
        },   {
        image: 'https://www.pngmart.com/files/10/Black-Ford-Mustang-PNG-Transparent-Image.png',
        title: '2017 Ford Mustang GT',
        brand: 'Ford',
        model: 'Mustang',
        version: 'GT',
        year: '2017',
        mileage: '25,000',
        energy: 'Gas',
        price: '25,000',
        price_retail: '28,500',
        price_monthly: '450',
        percentage: '-12'
    },
    {
        image: 'https://www.pngmart.com/files/3/BMW-X5-PNG-Transparent-Image.png',
        title: '2015 BMW X5 xDrive35i',
        brand: 'BMW',
        model: 'X5',
        version: 'xDrive35i',
        year: '2015',
        mileage: '50,000',
        energy: 'Gas',
        price: '28,000',
        price_retail: '32,500',
        price_monthly: '500',
        percentage: '-14'
    },   {
        image: 'https://www.pngmart.com/files/10/Black-Ford-Mustang-PNG-Transparent-Image.png',
        title: '2017 Ford Mustang GT',
        brand: 'Ford',
        model: 'Mustang',
        version: 'GT',
        year: '2017',
        mileage: '25,000',
        energy: 'Gas',
        price: '25,000',
        price_retail: '28,500',
        price_monthly: '450',
        percentage: '-12'
    },
    {
        image: 'https://www.pngmart.com/files/3/BMW-X5-PNG-Transparent-Image.png',
        title: '2015 BMW X5 xDrive35i',
        brand: 'BMW',
        model: 'X5',
        version: 'xDrive35i',
        year: '2015',
        mileage: '50,000',
        energy: 'Gas',
        price: '28,000',
        price_retail: '32,500',
        price_monthly: '500',
        percentage: '-14'
    },
    {
        image: 'https://www.pngmart.com/files/4/Chevrolet-Camaro-PNG-Transparent.png',
        title: '2018 Chevrolet Camaro SS 1LE',
        brand: 'Chevrolet',
        model: 'Camaro',
        version: 'SS 1LE',
        year: '2018',
        mileage: '15,000',
        energy: 'Gas',
        price: '30,000',
        price_retail: '35,000',
        price_monthly: '550',
        percentage: '-14'
    },
    {
        image: 'https://www.nicepng.com/png/full/134-1346043_benz-c-class-2016-mercedes-benz-c-class.png',
        title: '2019 Mercedes-Benz C 300',
        brand: 'Mercedes-Benz',
        model: 'C 300',
        version: '',
        year: '2019',
        mileage: '10,000',
        energy: 'Gas',
        price: '35,000',
        price_retail: '40,000',
        price_monthly: '600',
        percentage: '-12'
    },
    {
        image: 'https://www.pngmart.com/files/4/Chevrolet-Camaro-PNG-Transparent.png',
        title: '2018 Chevrolet Camaro SS 1LE',
        brand: 'Chevrolet',
        model: 'Camaro',
        version: 'SS 1LE',
        year: '2018',
        mileage: '15,000',
        energy: 'Gas',
        price: '30,000',
        price_retail: '35,000',
        price_monthly: '550',
        percentage: '-14'
    },
    {
        image: 'https://www.nicepng.com/png/full/134-1346043_benz-c-class-2016-mercedes-benz-c-class.png',
        title: '2019 Mercedes-Benz C 300',
        brand: 'Mercedes-Benz',
        model: 'C 300',
        version: '',
        year: '2019',
        mileage: '10,000',
        energy: 'Gas',
        price: '35,000',
        price_retail: '40,000',
        price_monthly: '600',
        percentage: '-12'
    },
    ],

      isOpen: false
    }
  },
  computed: {
  filteredItems() {
    const start = (this.currentPage - 1) * this.cardsPerPage;
    const end = start + this.cardsPerPage;
    return this.items.slice(start, end);
  }
},
  components: {
    SidebarMenu, NavBar, Card
  },

  methods: {
    toggleMenu() {
      this.isOpen = !this.isOpen
    },
    updateCurrentPage(page :number) {
        this.currentPage = page
    },
    async getVehicles() {
      try {
        const { data } = await axios.get('http://localhost:8000/vehicle')
        console.log(data)
        this.vehicles = data
      } catch (err) {
        console.error(err)
      }
    }
  },
  mounted() {
    this.getVehicles()
  }

}
</script>

<style>
.pagination{
margin-bottom: 20px;
}
.container {
  display: flex;
  width: 100%;
  flex-direction: column;
  gap: calc(20px + 5%);
}

.cards {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.nvbar {
  padding-top: 15px;
  width: 100%;
}

.side-bar {
  padding: 0px;
  width: 300px;
}

@media(max-width: 1300px) {
  .cards {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {

  .container {
    position: absolute;
    width: 90%;

  }

  .side-bar {
    z-index: 1;
  }

  .SlidOn {
    transform: translateX(-1000%);
  }

  .SlidOff {
    transform: translateX(0);
  }

  .cards {
    grid-template-columns: repeat(1, 1fr);

  }

  .app {
    overflow-x: hidden;
    display: block;
    padding: 0px;
  }
}

@media (max-width: 980px) and (min-width: 768px){
  .app {
    display: block !important;
  }
}

.app {
  font-family: Arial, Helvetica, sans-serif;
  display: flex;
  justify-content: center;
  padding: 20px;
  gap: 100px;
  height: 100vh;
}
</style>
