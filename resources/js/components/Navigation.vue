<template>
    <div class="btn__group">
        <button class="btn__clear" @click="prevButton" v-show="!isFirstStep()">
            <i class="fas fa-chevron-left"></i> Back
        </button>
        <button class="btn__primary" @click="nextButton">
            {{ nextButtonText() }}
        </button>
    </div>
</template>
<script>
    export default {
        methods: {
            nextButtonText() {
                return (this.$route.name === 'aboutForm') ? 'Submit Application' : 'Next'
            },
            isFirstStep() {
                return this.$route.name === 'workForm'
            },
            nextButton() {
                if (this.$route.name === 'aboutForm') { 
                    this.submit() 
                } else {
                    this.$router.push(`/step-2`)
                }
            },
            prevButton() {
                this.$router.push(`/step-1`)
            },
            submit() {
                fetch('/api/form/submit', {
                    method: 'post',
                    body: JSON.stringify(localStorage),
                    headers: {
                        'content-type': 'application/json',
                        credentials: 'include',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then( data=> {
                    console.log(data)
                    if (data.success === undefined) {
                        this.$emit('errors',data.errors)
                    } else {
                        localStorage.clear(); //Let's clear localStorage for next user on same PC. 
                        this.$router.push('/success')
                    }

                })
                .catch(err => console.log(`ERROR: ${err}`))
            }
        }
    }
</script>
