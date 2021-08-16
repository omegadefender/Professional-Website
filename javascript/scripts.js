currentLink = () => {
    let curLink = window.location.href;
    let urlArray = curLink.split('/')
    let lenArr = urlArray.length
    let lastStr = urlArray[lenArr-1]
    if (lastStr === 'index.html' || lastStr === '') {
        document.getElementById("navHome").style.color = '#0088a9'
    } 
    else if (lastStr === 'about.html') {
        document.getElementById("navHome").style.color = '#0088a9'
    }
    else if (lastStr === 'portfolio.html') {
        document.getElementById("navHome").style.color = '#0088a9'
        $(document).ready(function() {
          $(".wrap").fadeIn(1500)
            })
        }
    else if (lastStr === 'contact.html') {
        document.getElementById("contactButton").style.backgroundColor = 'white'
        document.getElementById("contactButton").style.color = '#0088a9'
    }
}

hider = () => {
    var me = document.getElementById("aboutme");
    var img = document.getElementById("mysteryme");
    var caption = document.getElementById("cap")
    if (me.style.display === "none") {
        me.style.display = "block";
        img.src = "../images/Profile-min.png";
        caption.innerHTML = "James Hastings";
    } else {
        me.style.display = "none";
        img.src = "../images/mysteryman-min.jpg";
        caption.innerHTML = "Click Image"
    }
}

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