<template>
    <div class="card">
        <div class="card__header">
            <p>Seller Application</p>
            <p>Step 1 of 2</p>
        </div>

        <div class="card__body">
            <h2 class="text__header--small">Share your work with us</h2>
            <p class="text--small">
                To ensure the quality of our marketplace, we limit our seller community to the most qualified creators.
                Let our curators know why you'd be a great seller:
            </p>
        </div>
        <div class="form">
            <div class="form__group form__group--inline">
                <div class="form__control">
                    <label class="form__label" for="firstName"> First Name</label>
                    <input class="form__input" required type="text" id="firstName" name="firstName" v-model="firstName"/>
                </div>

                <div class="form__control">
                    <label class="form__label" for="lastName"> Last Name</label>
                    <input class="form__input" required type="text" id="lastName" name="lastName" v-model="lastName"/>
                </div>
            </div>

             <div class="form__group">
                <div class="form__control form__select--wrapper">
                    <label class="form__label" for="shopCategory">Your Shop Category</label>
                    <select class="form__select" required v-model="shopCategory">
                        <option disabled value=""> Select Category </option>
                        <option value="Photos">Photos </option>
                        <option value="Graphics"> Graphics </option>
                        <option value="Themes"> Themes </option>
                        <option value="Fonts"> Fonts </option>
                        <option value="Add-Ons"> Add-Ons </option>
                        <option value="3D"> 3D </option>
                    </select>
                </div>
            
                <div class="form__control">
                    <label class="form__label" for="portfolioLink"> Portfolio Link </label>
                    <input class="form__input" required type="text" id="portfolioLink" name="portfolioLink" v-model="portfolioLink"/>
                </div>

                <div class="form__control checkbox__item" v-if="this.portfolioLink != '' ">
                    <input class="form__checkbox" type="checkbox" id="confirmAuthor" v-model="confirmAuthor"/>
                    <label for="confirmAuthor" > Yes, I confirm that the content I submit is authored by me. </label>
                </div>

                <div class="form__control">
                    <label class="form__label" for="existingOnlineStore">Do you own an existing store?</label>
                    <div class="radio__item">
                        <input type="radio" id="radio-affirm" name="existingOnlineStore" value="Yes" v-model="existingOnlineStore">
                        <label for="radio-affirm" class="form__radio">Yes</label>
                    </div>

                    <div class="radio__item">
                        <input type="radio" id="radio-neg" name="existingOnlineStore" value="No" v-model="existingOnlineStore">
                        <label for="radio-neg" class="form__radio" >No</label>
                    </div>

                    <label class="form__label" for="listOfStores" v-if="this.existingOnlineStore === 'Yes'"> Online stores I sell on today</label>
                    <textarea class="form__input" required v-model="listOfStores" placeholder="Enter urls" v-show="this.existingOnlineStore === 'Yes'"></textarea>
                </div>
            </div>
        </div>
        
        <Navigation />
    </div>
</template>
<script>
    import Navigation from '../Navigation'
    export default {
        data() {
            return {
                formHasErrors: 0,
                formSuccess: 0,
                firstName: '',
                lastName: '',
                shopCategory:'',
                portfolioLink: '',
                confirmAuthor: null,
                existingOnlineStore: null, 
                listOfStores: ''
            }
        },
        components: {
            Navigation
        },
        mounted() {
            if (localStorage.firstName) {
                this.firstName = localStorage.firstName
            }

            if (localStorage.lastName) {
                this.lastName = localStorage.lastName
            }

            if (localStorage.shopCategory) {
                this.shopCategory = localStorage.shopCategory
            }

            if (localStorage.portfolioLink) {
                this.portfolioLink = localStorage.portfolioLink
            }

            if (localStorage.confirmAuthor) {
                this.confirmAuthor = localStorage.confirmAuthor
            }

            if (localStorage.existingOnlineStore) {
                this.existingOnlineStore = localStorage.existingOnlineStore
            }

            if (localStorage.listOfStores) {
                this.listOfStores = localStorage.listOfStores
            }
        },
        watch: {
            // For a more complex form, persisting data using vuex would be preferred. 
            firstName(newFirstName) {
                localStorage.firstName = newFirstName
            },
            lastName(newLastName) {
                localStorage.lastName = newLastName
            },
            shopCategory(newShopCategory) {
                localStorage.shopCategory = newShopCategory
            },
            portfolioLink(newPortfolioLink) {
                localStorage.portfolioLink = newPortfolioLink
            },
            confirmAuthor(newConfirmAuthor) {
                localStorage.confirmAuthor = newConfirmAuthor
            },
            existingOnlineStore(newExistingOnlineStore) {
                localStorage.existingOnlineStore = newExistingOnlineStore
            },
            listOfStores(newListOfStores) {
                localStorage.listOfStores = newListOfStores
            },
        },
        methods: {
            
        }
    }
</script>
