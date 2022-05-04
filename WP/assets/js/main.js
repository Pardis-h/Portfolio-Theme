// Custom Burger
document.getElementById('burger').addEventListener("click", function(){ 
  let burger =document.getElementsByClassName("icon-bar");
  if( burger.length > 0 ){
    for( i in burger){
      burger[i].classList.toggle('open');
    }
  }
});

// Skills Bars
window.onscroll = function() {mySkillsBar()};
function mySkillsBar() {
  if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450) {
    let skill = document.getElementsByClassName('progress-bar');
    if (skill.length > 0){
      for( i in skill){
        let percent = skill[i].ariaValueNow;
        skill[i].animate([
            { width: `${percent}%` }, 
          ], {
            duration: 2000,
            fill: 'forwards'
        });
      };
    }
  }
}

// Dark Btn
document.getElementById('darkBtn').addEventListener("click", function(){ 

  document.getElementById('darkBtn').classList.toggle('btn-active');
  document.getElementsByTagName("body")[0].classList.toggle('bg-dark');
  document.getElementsByTagName("body")[0].classList.toggle('text-light');
  document.getElementsByTagName("body")[0].classList.toggle('bg-light-custom');
  let navbar = document.getElementsByClassName("navbar");
  if(navbar.length > 0){
    navbar[0].classList.toggle('bg-dark');
    navbar[0].classList.toggle('navbar-dark');
    navbar[0].classList.toggle('text-dark-custom');
  }

  let blogCard = document.getElementsByClassName("blog-card");
  if(blogCard.length > 0){
    for( i in blogCard){
      blogCard[i].classList.toggle('bg-dark');
    }
  }

  let AD = document.getElementsByClassName("ad");
  if(AD.length>0){
    AD[0].classList.toggle('ad-dark');
  }

 });

// Skill Tags
const myTags = [
    'JavaScript', 'CSS3', 'HTML5',
,   'React', 'git',
    'Wordpress', 'PHP', 'Gulp',
    'Sass', 'MySQL', 'jQuery',
    'Figma' , 'AdobeXD', 'English'
];
let tagCloud = TagCloud('.skill-content', myTags,{

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
let skill_content = document.querySelector('.skill-content');
if(skill_content !== null){
  let colors = ['#ba68c8', '#3FA796', '#FF5677'];
  let random_color = colors[Math.floor(Math.random() * colors.length)];
  skill_content.style.color = random_color;
  skill_content.addEventListener('click', function clickEventHandler(e) {
      if (e.target.className === 'tagcloud--item') {
          window.open(`https://www.google.com/search?q=${e.target.innerText}`, '_blank');
          // your code here
      }
  }); 
}

//Code Example
document.addEventListener('DOMContentLoaded', (event) => {
  document.querySelectorAll('pre code').forEach((el) => {
    hljs.highlightElement(el);
  });
});