<template>
    <form @submit.prevent="submitForm" method="post">
        <div v-if="currentPage === 1">
            <div class="field" v-for="(question, index) in page1Questions" :key="index">
                <label class="label">{{ question.label }}</label>
                <div class="control">
                    <input v-if="question.type === 'text'" class="input" v-model="answers[question.name]"
                        :type="question.type" :placeholder="question.placeholder">
                    <textarea v-if="question.type === 'textarea'" class="textarea" v-model="answers[question.name]"
                        :placeholder="question.placeholder"></textarea>
                    <select v-if="question.type === 'select'" class="select" v-model="answers[question.name]">
                        <option v-for="option in question.options" :key="option" :value="option">{{ option }}</option>
                    </select>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary" @click="nextPage">Volgende stap</button>
                </div>
            </div>
        </div>
        <div v-else-if="currentPage === 2">
            <div class="field" v-for="(question, index) in page2Questions" :key="index">
                <label class="label">{{ question.label }}</label>
                <div class="control">
                    <input v-if="question.type === 'text'" class="input" v-model="answers[question.name]"
                        :type="question.type" :placeholder="question.placeholder">
                    <textarea v-if="question.type === 'textarea'" class="textarea" v-model="answers[question.name]"
                        :placeholder="question.placeholder"></textarea>
                    <select v-if="question.type === 'select'" class="select" v-model="answers[question.name]">
                        <option v-for="option in question.options" :key="option" :value="option">{{ option }}</option>
                    </select>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button mr-3" @click="prevPage">Vorige stap</button>
                    <button class="button is-primary" @click="submitForm">Indienen</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            currentPage: 1,
            page1Questions: [
                { name: 'food_quality', label: 'Kwaliteit', type: 'select', options: ['Uitstekend', 'Goed', 'Gemiddeld', 'Laag'], placeholder: '' },
                { name: 'service', label: 'Gastvriendelijkheid', type: 'select', options: ['Uitstekend', 'Goed', 'Gemiddeld', 'Laag'], placeholder: '' },
            ],
            page2Questions: [
                { name: 'cleanliness', label: 'Schoonheid', type: 'select', options: ['Uitstekend', 'Goed', 'Gemiddeld', 'Laag'], placeholder: '' },
                { name: 'comments', label: 'Opmerkingen', type: 'textarea', options: [], placeholder: 'Wil je ons nog iets laten weten?' },
            ],
            answers: {
                food_quality: '',
                service: '',
                cleanliness: '',
                comments: ''
            }
        };
    },
    methods: {
        nextPage() {
            this.currentPage++;
        },
        prevPage() {
            this.currentPage--;
        },
        submitForm() {
            const formData = {
                food_quality: this.answers.food_quality,
                service: this.answers.service,
                cleanliness: this.answers.cleanliness,
                comments: this.answers.comments
            };

            axios.post('/api/feedback', formData)
                .then(response => {
                    window.location.href = '/sales/feedback/thankyou';
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                });
        }
    },
    name: 'Feedback'
};
</script>
