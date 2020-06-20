<template>
    <div class="row">
        <div v-for="category in categories" class="col-md-4">
            <h5>{{ category.title }}</h5>
            <draggable
                tag="ul"
                group="all-tasks"
                class="draggable-list pl-0"
                ghost-class="moving-card"
                :list="pendingTasks"
                :animation="200"
            >
                <div v-for="task in tasks">
                    <div v-if="task.category_id == category.id">
                        <a :href="'edit_task/' + task.id">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5>{{ task.title }}</h5>
                                    <p><em>{{ task.description }}</em></p>
                                    <p>Due Date: {{ task.due_date }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </draggable>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable
        },

        props: {
            categories: {
                type: Array,
                default: [],
            },
            tasks: {
                type: Array,
                default: [],
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    .draggable-list {
        min-height: 100px;
    }
    /* Unfortunately @apply cannot be setup in codesandbox,
    but you'd use "@apply border opacity-50 border-blue-500 bg-gray-200" here */
    .moving-card {
        opacity: 0.5;
        background: #F7FAFC;
        border: 1px solid #4299e1;
    }
</style>
