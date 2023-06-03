window.onload = function () {

    const sessionParams = {

    }
    function getParams() {
        const urlParams = new URLSearchParams(window.location.search);
        sessionParams.project_id = urlParams.get('project_id');

        console.log(sessionParams);
        return
    }


    async function startComponent() {

        await getParams()

        const projectData = await fetchProjectById(sessionParams.project_id)

        PopulateFormsWithData(projectData)

    }

    startComponent()


    function fetchProjectById(projectId) {
        return fetch(`./backend/getProjects.php?project_id=${projectId}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                return data
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function PopulateFormsWithData(projectData) {

        const projectIdInput = document.querySelector('#edit-project-id');
        const projectNameInput = document.querySelector('#edit-name');
        const projectDescriptionInput = document.querySelector('#edit-description');
        const projectStartDateInput = document.querySelector('#edit-start-date');
        const projectEndDateInput = document.querySelector('#edit-end-date');
        const projectPriorityInput = document.querySelector('#edit-priority');
        const projectStatusInput = document.querySelector('#edit-status');
        const projectUserIdInput = document.querySelector('#edit-user-id');
        
        projectIdInput.value = projectData.id;
        projectNameInput.value = projectData.name;
        projectDescriptionInput.value = projectData.description;
        projectStartDateInput.value = projectData.start_date;
        projectEndDateInput.value = projectData.end_date;
        projectPriorityInput.value = projectData.priority;
        projectStatusInput.value = projectData.status;
        projectUserIdInput.value = projectData.user_id;
        

        // Example usage
    
        // description
        // : 
        // "3123123132"
        // end_date
        // : 
        // "2023-06-09"
        // id
        // : 
        // 2
        // name
        // : 
        // "q2312312"
        // priority
        // : 
        // "medio"
        // start_date
        // : 
        // "2023-06-13"
        // status
        // : 
        // "123123"
        // user_id
        // : 
        // 123123
        

    }


}