window.onload = function () {

    const sessionParams = {}

    function getParams() {
        const urlParams = new URLSearchParams(window.location.search);
        sessionParams.project_id = urlParams.get('id');

        console.log(sessionParams);
        return sessionParams
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

        setEventListenerDeleteButton()

        console.log('RODEI isaac e carol! start component');

        // setEventListenerEditButton()
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
                    <div style="display: flex">
                        <button class=" btn btn-primary"  data-task-id=${task.id} onclick="openTaskEdit(this, 'data-task-id')">Editar</button>
                        <button class="delete-button btn btn-danger" taskid=${task.id}>Excluir</button>
                    </div>
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

    function setEventListenerDeleteButton() {
        console.log('delete-button Listeners')
        const deleteButtons = document.getElementsByClassName('delete-button');

        // Convert the HTML collection to an array
        const deleteButtonsArray = Array.from(deleteButtons);

        // Add event listener to each delete button
        deleteButtonsArray.forEach(button => {
            button.addEventListener('click', function () {
                // Retrieve the project ID from the data attribute
                const task_id = button.getAttribute('taskid');

                console.log(task_id)

                // Confirm deletion with the user
                if (confirm('Are you sure you want to delete this task?')) {
                    // Perform the delete operation
                    deleteProject(task_id);
                }
            });
        });
    }

    async function deleteProject(task_id) {
        // Function to handle the delete operation

        const data = {
            task_id: task_id
        };

        // Perform the delete request to your backend API
        await fetch(`./backend/deleteTask.php`, {
            method: 'post',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then(response => {
                alert('Task deleted successfully!')
                location.reload();
            })
            .catch(error => {
                // Handle any errors that occur during the request
                console.error('Error:', error);
            });
    }

}