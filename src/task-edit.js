window.onload = function () {

    const sessionParams = {

    }
    function getParams() {
        const urlParams = new URLSearchParams(window.location.search);
        sessionParams.task_id = urlParams.get('task_id');

        console.log(sessionParams);
        return
    }


    async function startComponent() {

        await getParams()

        const projectData = await fetchProjectById(sessionParams.task_id)

        PopulateFormsWithData(projectData)

    }

    startComponent()


    function fetchProjectById(task_id) {
        return fetch(`./backend/getTasks.php?task_id=${task_id}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                return data[0]
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function PopulateFormsWithData(projectData) {

        console.log(projectData)

        const task_idInput = document.querySelector('#task_id');

        const projectIdInput = document.querySelector('#projectId');
        const projectNameInput = document.querySelector('#taskName');
        const projectDescriptionInput = document.querySelector('#taskDescription');
        const projectCompletedInput = document.querySelector('#completed');
        const projectCreatedAtInput = document.querySelector('#createdAt');


        task_idInput.value = projectData.id;
        projectIdInput.value = projectData.project_id;
        projectNameInput.value = projectData.task_name;
        projectDescriptionInput.value = projectData.task_description;
        projectCompletedInput.value = projectData.completed.toString();
        const createdAtDate = new Date(projectData.created_at);
        const formattedCreatedAt = createdAtDate.toISOString().split('T')[0];

        projectCreatedAtInput.value = formattedCreatedAt;


    }


}