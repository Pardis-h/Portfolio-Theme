const myTags = [
    'JavaScript', 'CSS3', 'HTML5',
,   'React', 'git',
    'Wordpress', 'PHP', 'Gulp',
    'Sass', 'MySQL', 'jQuery',
    'Figma' , 'AdobeXD',
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