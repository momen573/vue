<template>
  <section>
    <form @submit.prevent="handle">
      <div>
        <label for="userId">number:</label>
        <input type="text" id="number" v-model="postData.number" @change="handle">
      </div>
      <div>
        <label for="title">language: </label>
       
        <select id="language" v-model="postData.language" @change="handle">
        <option value="fa" selected>persian</option>
         <option value="es_ES">Spain</option>
          <option value="tu">Turkish</option>
           <option value="en">english</option>
            <option value="fr">franch</option>
             <option value="de">Deutschland</option>
             <option value="zh-CN">china</option>
             <option value="hi">hindi</option>
             <option value="zh-CN">china</option>
             <option value="ar">Arabic</option>
        </select>
      </div>
      
      <input type="submit" value="send" />
        <h1>{{ message }}</h1>

    </form>
  </section>
</template>

<script>
 
import axios from 'axios'

export default {
  data() {
    return {
      postData: {
        number: '0',
        language:  'fa',
        
      },
      message:""
    }
  },
  methods: {
    
   handle() {
		axios
    .post('http://localhost:9000/api/convert', this.postData)
    .then((response) =>this.message=response.data.spellout
   
    )
	}
  }
}
</script>



<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

section{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width:50%;
  margin: 20px auto;

}
h1{
  text-align:center;
}
</style>
