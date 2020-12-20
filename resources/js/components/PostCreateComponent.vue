<template>
    <div>
        <div class="d-flex justify-content-center container" style="height: 100%">
        <div class="col">
            <div class="card col-lg-12 single-post bg-3">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <div class="form-group">
                                <label for="title" class="form-text">Title</label>
                                <input type="text" class="form-control input" id="title" aria-describedby="emailHelp" placeholder="Title" name="title" v-model="title">
                            </div>
                            <div class="form-group">
                                <hr class="solid">
                                <label for="time_hours" class="form-text">Time to cook in minuites</label>
                                <input type="number" class="form-control input" id="time_hours" placeholder="Mins" name="time_hours" v-model="cookTime">
                            </div>
                            <div class="form-group">
                                <hr class="solid">
                                <label for="image" class="form-text">Image</label>
                                <input type="file" class="form-control input" id="image" name="image" @change="selectFile">
                            </div>
                            <div class="form-group">
                                <hr class="solid">
                                <label for="ingredient" class="form-text">Ingredient</label>
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control input" placeholder="Ingredient" name="ingredient" v-model="addIngredientsInput">
                                        <div v-if="!!error" class="error-div">{{error}}</div>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="buton" class="button" @click="addIngredient">Add Ingredient</button>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div>
                                        <label for="spicy" style="color: black">Spicy</label>
                                        <input type="checkbox" id="spicy" name="spicy" style="margin-end: 10px" v-model="spicy">
                                    </div>
                                    <div>
                                        <label for="glutenFree" style="color: black">Gluten Free</label>
                                        <input type="checkbox" id="glutenFree" name="glutenFree" style="margin-end: 10px" v-model="glutenFree">
                                    </div>
                                    <div>
                                        <label for="vegitarian" style="color: black">Vegitarian</label>
                                        <input type="checkbox" id="vegitarian" name="vegitarian" style="margin-end: 10px" v-model="vegitarian">
                                    </div>
                                    <div>
                                        <label for="vegan" style="color: black">Vegan</label>
                                        <input type="checkbox" id="vegan" name="vegan" style="margin-end: 10px" v-model="vegan">
                                    </div>
                                    <div>
                                        <label for="lowCalories" style="color: black">Low Calories</label>
                                        <input type="checkbox" id="lowCalories" name="lowCalories" style="margin-end: 10px" v-model="lowCalories">
                                    </div>
  
                                </div>
                            </div>
                            <div class="chips-container">
                                <div v-for="(ingredient, i) of ingredients" class="chip">
                                    {{ ingredient[0] }}
                                    <div v-if="ingredient.length > 1">
                                        <i class="info-icon material-icons">info</i>
                                        <span class="tool-tip-text">
                                            Tags:
                                            <ul>
                                                <div v-for="(tag, j) of ingredient">
                                                    <div v-if="j !== 0">
                                                        <li>{{tag}}</li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </span>
                                    </div>
                                    <i class="material-icons delete-ingrediant" @click="deleteChip(i)">clear</i>
                                </div>
                            </div>
                            <div class="form-group">
                                <hr class="solid">
                                <label for="instructions" class="form-text">Instructions</label>
                                <textarea class="form-control input" id="instructions" name="instructions" rows="3" v-model="instructions">
                                </textarea>
                            </div>
                            <hr class="solid">
                            <button type="button" class="button" @click="createPost">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>

    export default {
        data: function() {
            return {
                title: '',
                cookTime: 0,
                image: null,
                instructions: '',
                ingredients: [],
                addIngredientsInput: '',
                spicy: false,
                glutenFree: false,
                vegitarian: false,
                vegan: false,
                lowCalories: false,
                error: '',
            }
        },
        mounted() {

        },
        methods: {
            addIngredient: function() {
                
                if (this.addIngredientsInput == '') {
                    this.error = "Ingrediant cannot be blank.";
                } else {
                    this.error = '';
                    var item = [this.addIngredientsInput];
                    if (this.spicy) {
                        item.push('Spicy')
                    }
                    if (this.glutenFree) {
                        item.push('Gluten Free')
                    }
                    if (this.vegitarian) {
                        item.push('Vegitarian')
                    }
                    if (this.vegan) {
                        item.push('Vegan')
                    }
                    if (this.lowCalories) {
                        item.push('Low Calories')
                    }
                    
                    this.ingredients.push(item);

                    this.addIngredientsInput = '';
                    this.spicy = false;
                    this.glutenFree = false;
                    this.vegitarian = false;
                    this.vegan = false;
                    this.lowCalories = false;
                }
            },

            deleteChip: function(i) {
                this.ingredients.splice(i, 1);
            },

            createPost: function() {
                const data = new FormData();
                data.append('image', this.image);
                data.append('title', this.title);
                data.append('cook_time', this.cookTime)
                data.append('instructions', this.instructions);
                const json = JSON.stringify({
                    ingredients: this.ingredients,
                });
                data.append('data', json);
                axios.post('/posts', data);
            },
            selectFile(event) {
                // `files` is always an array because the file input may be in multiple mode
                this.image = event.target.files[0];
            }
        },
    };
</script>