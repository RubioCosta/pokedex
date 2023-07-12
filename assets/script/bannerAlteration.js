setInterval(function alterColor(){
    let color = document.querySelector('.banner-header');
    if(color.getAttribute('name') == 'blue'){
        color.setAttribute('name', 'red');
        document.querySelector('.banner-text-first').innerHTML = 'Quem é esse Pokemon?';
        document.querySelector('.banner-header').style.backgroundImage  = 'url("assets/image/background-red.png")';
        document.querySelector('.pokebola-img').setAttribute('src', 'assets/image/pokebola-red.png');
    } else{
        color.setAttribute('name', 'blue');
        document.querySelector('.banner-text-first').innerHTML = 'Pegue todos eles!';
        document.querySelector('.banner-header').style.backgroundImage  = 'url("assets/image/background-blue.png")';
        document.querySelector('.pokebola-img').setAttribute('src', 'assets/image/pokebola-blue.png');
    }
}, 6000);