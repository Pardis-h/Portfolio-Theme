// Skills Bars

window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450) {
    let skill = document.getElementsByClassName('progress-bar');
    for( item in skill){
        let percent = skill[item].ariaValueNow;
        skill[item].animate([
            { width: `${percent}%` }, 
          ], {
            duration: 2000,
            fill: 'forwards'
          });
        console.log(percent);
    };
  }
}

// Dark Btn
document.getElementById('darkBtn').addEventListener("click", function(){ 
  // console.log(document.getElementsByClassName(".navbar"));
  document.getElementById('darkBtn').classList.toggle('btn-active');
  document.getElementsByTagName("body")[0].classList.toggle('bg-dark');
  document.getElementsByTagName("body")[0].classList.toggle('text-light');
  document.getElementsByTagName("body")[0].classList.toggle('bg-light-custom');
  document.getElementsByClassName("navbar")[0].classList.toggle('bg-dark');
  document.getElementsByClassName("navbar")[0].classList.toggle('navbar-dark');
  document.getElementsByClassName("navbar")[0].classList.toggle('text-dark-custom');
  // document.getElementsByClassName("ad")[1].classList.toggle('ad-dark');

  let blogCard = document.getElementsByClassName("blog-card");
  for( item in blogCard){
    blogCard[item].classList.toggle('bg-dark');
    blogCard[item].classList.toggle('title-dark');
  };
  document.getElementsByClassName("ad")[0].classList.toggle('ad-dark');

  let AD = document.getElementsByClassName("ad");
  console.log(AD)
  for( item in AD){
    AD[item].classList.toggle('ad-dark');
  };
 });

// Skill Tags
const myTags = [
    'JavaScript', 'CSS3', 'HTML5',
,   'React', 'git',
    'Wordpress', 'PHP', 'Gulp',
    'Sass', 'MySQL', 'jQuery',
    'Figma' , 'AdobeXD', 'English'
];
let tagCloud = TagCloud('.content', myTags,{

    // radius in px
    radius: 250,
  
    // animation speed
    // slow, normal, fast
    maxSpeed: 'normal',
    initSpeed: 'normal',
  
    // 0 = top
    // 90 = left
    // 135 = right-bottom
    direction: 135,
  
    // interact with cursor move on mouse out
    keep: true  
  }); 
let colors = ['#ba68c8', '#3FA796', '#FF5677'];
let random_color = colors[Math.floor(Math.random() * colors.length)];
document.querySelector('.content').style.color = random_color;
let rootEl = document.querySelector('.content');
rootEl.addEventListener('click', function clickEventHandler(e) {
    if (e.target.className === 'tagcloud--item') {
        window.open(`https://www.google.com/search?q=${e.target.innerText}`, '_blank');
        // your code here
    }
}); 



