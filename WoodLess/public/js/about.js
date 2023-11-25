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
    // default show about us
    faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'none';
// when about us clicked show aboutus text hide rest 
    aboutButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'block';
        faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'none';
    })
    // when FAQ clicked  show relevant text  hide rest 
    faqButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'none';
        faqText.style.display = 'block';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'none';
    })
    // when  commitment  clicked  show relevant text  hide rest 
    ourCommitmentsButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'none';
        faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'block';
        meetTheTeamText.style.display = 'none';
    })
     // when meet team  clicked  show relevant text  hide rest 
    meetTeamButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'none';
        faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'block';
    })
})
