// Attendre que la page soit entièrement chargée
window.addEventListener('load', function () {
    // Sélectionner les éléments texte à glisser
    const texteGlissant = document.getElementById('texteGlissant');
    const texteGlissant2 = document.getElementById('texteGlissant2');

    // Créer une timeline GSAP pour le premier texte (de gauche à droite)
    const timeline1 = gsap.timeline();
    timeline1.to(texteGlissant, { x: "400%", duration: 3, ease: "power1.inOut" })
            .to(texteGlissant, { opacity: 0, duration: 0.2 });

    // Créer une timeline GSAP pour le deuxième texte (de droite à gauche)
    const timeline2 = gsap.timeline();
    timeline2.to(texteGlissant2, { x: "-400%", duration: 3, ease: "power1.inOut" })
            .to(texteGlissant2, { opacity: 0, duration: 0.2});

    // Lancer les animations lorsque la page est chargée
    timeline1.play();
    timeline2.play();

});
