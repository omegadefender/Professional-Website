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
            $(".box01portfolio").hide()
            $(".box01portfolio").fadeIn(1500)
            })
        }

    else if (lastStr === 'contact.html') {
        document.getElementById("contactButton").style.backgroundColor = 'white'
        document.getElementById("contactButton").style.color = '#0088a9'
    }
}