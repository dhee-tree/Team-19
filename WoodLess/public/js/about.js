document.addEventListener('DOMContentLoaded', function standard () {
    //define variables
    var aboutButton = document.getElementById('about');
    var faqButton = document.getElementById('faq');
    var ourCommitmentsButton = document.getElementById('ourcommitments');
    var meetTeamButton = document.getElementById('meetteam');
    var aboutText = document.getElementById('aboutustext');
    var faqText = document.getElementById('FAQtext');
    var ourCommitmentsText = document.getElementById('ourcommitmentstext');
    var meetTheTeamText = document.getElementById('meettheteamtext');
    // default show about us with color grey 
    faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'none';
        aboutButton.style.color = 'grey';
// when about us clicked show aboutus text hide rest and change color
    aboutButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'block';
        faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'none';
        faqButton.style.color = 'black';
        meetTeamButton.style.color = 'black';
        ourCommitmentsButton.style.color = 'black'; 
        aboutButton.style.color = 'grey';
    })
    
    // when FAQ clicked  show relevant text  hide rest and change color
    faqButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'none';
        faqText.style.display = 'block';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'none';
        faqButton.style.color = 'grey';
        aboutButton.style.color = 'black';
        meetTeamButton.style.color = 'black';
        ourCommitmentsButton.style.color = 'black';
    })
    // when  commitment  clicked  show relevant text  hide rest and change color
    ourCommitmentsButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'none';
        faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'block';
        meetTheTeamText.style.display = 'none';
        faqButton.style.color = 'black';
        aboutButton.style.color = 'black';
        meetTeamButton.style.color = 'black';
        ourCommitmentsButton.style.color = 'grey';
    })
     // when meet team  clicked  show relevant text  hide rest and change color
    meetTeamButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'none';
        faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'block';
        faqButton.style.color = 'black';
        aboutButton.style.color = 'black';
        meetTeamButton.style.color = 'grey';
        ourCommitmentsButton.style.color = 'black';
    })
    
});


