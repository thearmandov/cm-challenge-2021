<template>
    <div class="card">
         <div class="card__header">
            <p>Seller Application</p>
            <p>Step 2 of 2</p>
        </div>

        <div class="card__errors" v-show="Object.keys(this.formErrors).length != 0">
            <h2 class="text__header--x-small"> Something went wrong, review errors and try again. </h2>
            <ul>
                <li v-for="(error, index) in this.formErrors" :key="index"> {{error[0]}}  </li>
            </ul>
        </div>

        <div class="card__body">
            <h2 class="text__header--small">Tell us a little about yourself</h2>
            <p class="text--small">
                Your answers will help us provide you with a more personalized experience as a seller!
            </p>
        </div>

        <div class="form">
            <div class="form__group">
                <div class="form__control form__select--wrapper">
                    <label class="form__label" for="qualityPerspective">
                        When create products to sell, which best describes your perspective on quality?
                    </label>
                    <select class="form__select" required v-model="qualityPerspective" id="downdown__container">
                        <option disabled value="" selected> Select Answer </option>
                        <option v-for="(option, index) in this.perspectiveOptions" :key="index" :value="option" > {{option}}</option>
                    </select>
                </div>

                <div class="form__control form__select--wrapper">
                    <label class="form__label" for="onlineSalesExperience">
                        How would you descript your experience level as an online seller?
                    </label>
                    <select class="form__select" required v-model="onlineSalesExperience">
                        <option disabled value="" selected> Select Answer </option>
                        <option v-for="(option, index) in this.salesOptions" :key="index" :value="option" > {{option}}</option>
                    </select>
                </div>

                <div class="form__control form__select--wrapper">
                    <label class="form__label" for="businessMarketingExp">
                        How would you describe your understanding of business and marketing?
                    </label>
                    <select class="form__select" required v-model="businessMarketingExp">
                        <option disabled value="" selected> Select Answer </option>
                        <option v-for="(option, index) in this.marketingOptions" :key="index" :value="option" > {{option}}</option>
                    </select>
                </div>

            </div>
        </div>
        
        <!-- @errors emits an event that triggers an error message, if the API fails to respond with a successfull message. -->
        <Navigation @errors="getErrorMessages" />
    </div>
</template>
<script>
    import Navigation from '../Navigation'
    export default {
        data() {
            return {
                formErrors: {},
                perspectiveOptions: [],
                salesOptions: [],
                marketingOptions: [],
                qualityPerspective: '',
                onlineSalesExperience:  '',
                businessMarketingExp: ''
            }
        },
        components: {
            Navigation
        },
        created() {
            this.getBusinessMarketingExpOptions()
            this.getOnlineSalesExperienceOptions()
            this.getQualityPerspectiveOptions()
        },
        mounted() {
            if (localStorage.qualityPerspective) {
                this.qualityPerspective = localStorage.qualityPerspective
            }

            if (localStorage.onlineSalesExperience) {
                this.onlineSalesExperience = localStorage.onlineSalesExperience
            }

            if (localStorage.businessMarketingExp) {
                this.businessMarketingExp = localStorage.businessMarketingExp
            }
        },
        watch: {
            // For a more complex form, persisting data using vuex would be preferred. 
            qualityPerspective(newQualityPerspective) {
                localStorage.qualityPerspective = newQualityPerspective
            },
            onlineSalesExperience(newOnlineSalesExperience) {
                localStorage.onlineSalesExperience = newOnlineSalesExperience
            },
            businessMarketingExp(newBusinessMarketingExp) {
                localStorage.businessMarketingExp = newBusinessMarketingExp
            },
        },
        methods: {
            getErrorMessages(value) {
                this.formErrors = value
                console.log(this.formErrors)
            },
            getQualityPerspectiveOptions() {
                const options = [
                    "I don't care what it takes, my products are the highest quality possible",
                    "I put in enough effort to make my product pretty high quality, but at some point my time is better spent elsewhere",
                    "I try to get quality products out quickly, even if I need to take a shortcut now and then",
                    "I spend the minimum amount of time & effort it takes to create products that are acceptable quality.",
                    "Quantity is more important to me than quality."
                ]

                this.perspectiveOptions = options
            },
            getOnlineSalesExperienceOptions() {
                const options = [
                    "I sell on multiple marketplaces and through my own website",
                    "I have experience selling through only my own website",
                    "I have experience selling through multiple marketplaces",
                    "I have experience selling through one online marketplace",
                    "I'm new to selling creative products online"
                ]

                this.salesOptions = options
            },
            getBusinessMarketingExpOptions() {
                const options = [
                    "I have an extensive background in business and/or marketing",
                    "I'm familiar with some skill & techniques, but I'm not sure how to apply them when selling my creative work",
                    "I'm vaguely aware of basic business & marketing concepts",
                    "I'm not interested in understanding business & marketing"
                ]

                this.marketingOptions = options
            }
        }
    }
</script>
