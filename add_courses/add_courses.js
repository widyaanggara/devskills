const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

menuBtn.addEventListener('click', () => {
    sideMenu.classList.add('active');
});

closeBtn.addEventListener('click', () => {
    sideMenu.classList.remove('active');
});

// button add materi active
document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll('.materi-btn');
    const contents = document.querySelectorAll('.materi-content');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            document.querySelector('.materi-btn.active').classList.remove('active');
            this.classList.add('active');
            
            contents.forEach(content => {
                content.classList.add('hidden');
            });

            const contentId = this.getAttribute('data-content');
            document.getElementById(contentId).classList.remove('hidden');
        });
    });
});