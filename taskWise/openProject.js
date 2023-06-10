window.onload = function () {

    const sessionParams = {

    }

    // function openProject(button, projectId) {
    //     console.log('RODEI isaac e carol! botao de open project');
    //     var projectId = button.getAttribute("data-project-id");

    //     // Use the parameters in your logic
    //     console.log("Parameter 1: " + projectId);

    //     // Redirect to the openProject page with the project ID in the URL
    //     window.location.href = "/openProject?id=" + projectId;
    //   }

    function getParams() {
        const urlParams = new URLSearchParams(window.location.search);
        sessionParams.project_id = urlParams.get('id');

        console.log(sessionParams);
        return sessionParams
    }

    function setEventListenerEditButton() {

        // setando event listener no botao de editar
        console.log('RODEI isaac e carol! event listeneer');

        const editButtons = document.getElementsByClassName('edit-button');

        const editButtonsArray = Array.from(editButtons);

        console.log(editButtonsArray);

        editButtonsArray.forEach(button => {
            button.addEventListener('click', function () {
                console.log('RODEI isaac e carol! event listeneer');

                const projectId = button.getAttribute('data-project-id');

                // console.log(button.dataset.data-project-id);
                window.location.href = `./editarTask.php?project_id=${projectId}`;
            });
        });

    }

    function setEventListenerDeleteButton() {
        const deleteButtons = document.getElementsByClassName('delete-button');

        // Convert the HTML collection to an array
        const deleteButtonsArray = Array.from(deleteButtons);

        // Add event listener to each delete button
        deleteButtonsArray.forEach(button => {
            button.addEventListener('click', function () {
                // Retrieve the project ID from the data attribute
                const projectId = button.dataset.projectId;

                // Confirm deletion with the user
                if (confirm('Are you sure you want to delete this project?')) {
                    // Perform the delete operation
                    deleteProject(projectId);
                }
            });
        });

        // Function to handle the delete operation
        function deleteProject(projectId) {

            const data = {
                project_id: projectId
            };

            // Perform the delete request to your backend API
            fetch(`./backend/deleteProject.php`, {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the backend
                    console.log(data);
                    // Refresh the page or update the UI as needed
                })
                .catch(error => {
                    // Handle any errors that occur during the request
                    console.error('Error:', error);
                });
        }
    }

    async function startComponent() {
        const params = getParams()
        console.log(params)

        //funcção que faz o fetch dos dados do projeto 

        const projectData = await fetch(`./backend/getProjects.php?project_id=${params.project_id}`).then(response => response.json())

        console.log("projectData")
        console.log(projectData)

        renderProjectDataOnPage(projectData)

        await populateTasksTable();

        console.log('RODEI isaac e carol! start component');

        // setEventListenerEditButton()
        // setEventListenerDeleteButton()
    }

    startComponent()

    async function populateTasksTable() {
        console.log('RODEI isaac e carol!');

        const projectId = sessionParams.project_id; // Replace 123 with the actual project ID

        // Construct the URL with the project ID parameter
        const url = `./backend/getTasks.php?project_id=${projectId}`;

        await fetch(url) // Substitua pelo endpoint da sua API no backend
            .then(response => response.json())
            .then(data => {

                console.log(data);

                const tableBody = document.querySelector('#projectTable tbody');
                tableBody.innerHTML = '';

                data.forEach(task => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                    <td>
                        ${task.completed ? '&#10003;' : ''}
                    </td>
                    <td>${task.id}</td>
                    <td>${task.task_name}</td>
                    <td>${task.task_description}</td>
                    <td>${task.created_at}</td>
                    <td>
                    <button class=" btn btn-primary"  data-task-id=${task.id} onclick="openTaskEdit(this, 'data-task-id')" >Edit Tasks</button>
                        <button class="delete-button btn btn-danger" data-task-id=${task.id}>Delete</button>
                    </td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function renderProjectDataOnPage(projectData) {

        const projectName = document.getElementById('projectName');

        const descriptionlabel = document.getElementById('description');
        console.log(descriptionlabel)

        const startDatelabel = document.getElementById('startDate');
        const endDatelabel = document.getElementById('endDate');
        const prioritylabel = document.getElementById('priority');
        const statusLabel = document.getElementById('status');
        const nome_criador = document.getElementById('nome_criador');
        const id_criador = document.getElementById('id_criador');
        const email_criador = document.getElementById('email_criador');

        nome_criador.innerHTML = projectData.nome_criador.toUpperCase();
        id_criador.innerHTML = projectData.user_id
        email_criador.innerHTML = projectData.email_criador

        projectName.innerHTML = "Project: " + projectData.name;

        descriptionlabel.innerHTML = projectData.description;
        startDatelabel.innerHTML = projectData.start_date;
        endDatelabel.innerHTML = projectData.end_date;
        prioritylabel.innerHTML = projectData.priority;
        statusLabel.innerHTML = projectData.status;

    }

}