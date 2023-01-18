<template>
  <div class="card" style=" position: static;">
    <div >
      <img :src="image" :alt="brand" class="card-img-top" />
    </div>
    <div class="card-body">
      <div>
        <h4  class="brand">{{ brand }}</h4>
        <h1 class="model">{{ model }}</h1>
        <p class="card-text">{{ version }}</p>
        <div>
          <p style="display: inline" class="card-text">{{ year }} - </p>
          <p style="display: inline" class="card-text">{{ energy }} - </p>
          <p style="display: inline" class="card-text">{{ mileage }} ch</p>
        </div>
      </div>
      <div style=" text-align: right;">
        <h1 class="card-text">{{ price_retail }} €</h1>

        <div>
          <p style="display: inline" class="card-text">{{ price }} €</p>
          <p style="display: inline" class="percentage">{{ percentage }}%</p>
        </div>
        <p style="margin-bottom: 0px;">Ou à partir de</p>
        <h3 class="card-text">{{ price_monthly }} €</h3>
        <p style="margin-top: 0px;">/mois</p>

      </div>

    </div>
  </div>
</template>

<script lang="ts">
import { Vue, Prop } from 'vue-property-decorator'

export default class Card extends Vue {
  @Prop()
  image!: string

  @Prop()
  brand!: string

  @Prop()
  model!: string

  @Prop()
  version!: string

  @Prop()
  year!: string

  @Prop()
  mileage!: number

  @Prop()
  energy!: string

  @Prop()
  price!: number

  @Prop()
  price_retail!: number

  @Prop()
  price_monthly!: number

  @Prop()
  percentage!: number

}
</script>

<style scoped>
.percentage {
  background-color: #ff9933;
  margin-right: 5px;
  margin-left: 5px;
}

.brand {
  text-transform: uppercase;
  color: #4da6ff;
}

p {
  color: #7a7a7a;
}
h3{
  margin: 0;
  color: #7a7a7a;

}
h4{
  margin-bottom: 5px;
  margin-top: 0;
}
h1 {
  margin: 0px;
  text-transform: uppercase;
  color: #202060;
}

.card-body {
  background-color: #d4e9fe;
  padding: 20px;
  display: flex;
  justify-content: space-between;
}

.card {
 
  font-family: Arial, Helvetica, sans-serif;
  width: 100%;
  border-style: solid;
  border-radius: 10px;
  border-color: #d4e9fe;
  border-width: 2px;
}

.card-img-top {
  width: 100%;
  height: 250px;
  object-fit: cover;
  border-radius: 10px 10px 0px  0px;
}
</style>
