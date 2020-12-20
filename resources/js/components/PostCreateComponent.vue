<template>
    <div>
        <div class="d-flex justify-content-center container" style="height: 100%">
            <div class="col">
                <div class="card col-lg-12 single-post bg-3">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <div v-if="!!errors" class="error-div">
                                    <ul>
                                        <div v-for="error in errors" :key="error[0]">
                                            <li>{{ error[0] }}</li>
                                        </div>
                                    </ul>
                                </div>
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
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="buton" class="button" @click="addIngredient">Add Ingredient</button>
                                        </div>
                                    </div>
                                    <label for="spicy" class="form-text">Add tags to the ingredient</label>
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
                                    <div v-for="(ingredient, i) of ingredients" class="chip" :key="i">
                                        {{ ingredient[0] }}
                                        <div v-if="ingredient.length > 1">
                                            <i class="info-icon material-icons">info</i>
                                            <span class="tool-tip-text">
                                                Tags:
                                                <ul>
                                                    <div v-for="(tag, j) of ingredient" :key="j">
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

                                <div class="form-group">
                                    <hr class="solid">
                                    <label for="spicyPost" class="form-text">Add tags to the post</label>
                                    <div class="d-flex">
                                        <div>
                                            <label for="spicyPost" style="color: black">Spicy</label>
                                            <input type="checkbox" id="spicyPost" name="spicyPost" style="margin-end: 10px" v-model="spicyPost">
                                        </div>
                                        <div>
                                            <label for="glutenFreePost" style="color: black">Gluten Free</label>
                                            <input type="checkbox" id="glutenFreePost" name="glutenFreePost" style="margin-end: 10px" v-model="glutenFreePost">
                                        </div>
                                        <div>
                                            <label for="vegitarianPost" style="color: black">Vegitarian</label>
                                            <input type="checkbox" id="vegitarianPost" name="vegitarianPost" style="margin-end: 10px" v-model="vegitarianPost">
                                        </div>
                                        <div>
                                            <label for="veganPost" style="color: black">Vegan</label>
                                            <input type="checkbox" id="veganPost" name="veganPost" style="margin-end: 10px" v-model="veganPost">
                                        </div>
                                        <div>
                                            <label for="lowCaloriesPost" style="color: black">Low Calories</label>
                                            <input type="checkbox" id="lowCaloriesPost" name="lowCaloriesPost" style="margin-end: 10px" v-model="lowCaloriesPost">
                                        </div>
                                    </div>
                                </div>

                                <hr class="solid">
                                <button type="button" class="button" @click="createPost">Submit</button>
=                            </div>
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
                cookTime: null,
                image: null,
                instructions: '',
                ingredients: [],
                addIngredientsInput: '',
                spicy: false,
                glutenFree: false,
                vegitarian: false,
                vegan: false,
                lowCalories: false,
                spicyPost: false,
                glutenFreePost: false,
                vegitarianPost: false,
                veganPost: false,
                lowCaloriesPost: false,
                errors: null,
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

                    var item = [];
                    if (this.spicyPost) {
                        item.push('Spicy')
                    }
                    if (this.glutenFreePost) {
                        item.push('Gluten Free')
                    }
                    if (this.vegitarianPost) {
                        item.push('Vegitarian')
                    }
                    if (this.veganPost) {
                        item.push('Vegan')
                    }
                    if (this.lowCaloriesPost) {
                        item.push('Low Calories')
                    }
                
                const jsonPostTags = JSON.stringify({
                    tags: item,
                });
                data.append('tags', jsonPostTags);
                const json = JSON.stringify({
                    ingredients: this.ingredients,
                });
                data.append('data', json);
                axios.post('/posts', data)
                .then (response => {
                    window.location.replace('/posts');
                })
                .catch(error => {
                    console.log(error.response.data.errors);
                    this.errors = error.response.data.errors;
                });
            },
            selectFile(event) {
                // `files` is always an array because the file input may be in multiple mode
                this.image = event.target.files[0];
            }
        },
    };
</script>