window.onload = function () {

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
                window.location.href = `./tasksedit.php?project_id=${projectId}`;
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
        await populateProjectTable();

        setEventListenerEditButton()
        setEventListenerDeleteButton()
    }

    startComponent()

    async function populateProjectTable() {
        console.log('RODEI isaac e carol!');
        await fetch('./backend/getProjects.php') // Substitua pelo endpoint da sua API no backend
            .then(response => response.json())
            .then(data => {

                console.log(data);

                const tableBody = document.querySelector('#projectTable tbody');
                tableBody.innerHTML = '';

                data.forEach(project => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${project.name}</td>
                        <td>${project.description}</td>
                        <td>${project.start_date}</td>
                        <td>${project.end_date}</td>
                        <td>${project.priority}</td>
                        <td>${project.status}</td>
                        <td>
                            <button class="edit-button" data-project-id=${project.id}>Edit</button>
                        </td>
                        <td>
                            <button class="delete-button" data-project-id=${project.id}>Delete</button>
                         </td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
}