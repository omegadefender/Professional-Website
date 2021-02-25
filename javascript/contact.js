noName = () => {
    let nameInput = document.getElementById("name1")
    nameInput.setCustomValidity('Name is required')
}

noEmail = () => {
    let emailInput = document.getElementById("email")
    emailInput.setCustomValidity('Email address is required')
}

input = () => {
    let nameInput = document.getElementById('name1')
    let emailInput = document.getElementById("email")
    nameInput.setCustomValidity('')
    emailInput.setCustomValidity('')
}