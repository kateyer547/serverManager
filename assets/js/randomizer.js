(function() {
    // Détecte si l'utilisateur est sur mobile ou PC
    function isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || window.innerWidth <= 768;
    }

    // Liste des images par type d'appareil
    const images = {
        pc: [
            'palworld-lamball-with-guns.jpg',
            'palworldLogoPC.jpg',
            'palworldReveil.jpg',
            'specialPC.jpg'
        ],
        telephone: [
            'palworld-lamball-with-guns.jpg',
            'palworld-zoe-rayne.jpg',
            'palworldNoLogo.jpg',
            'specialTel.jpg'
        ]
    };

    // Fonction pour choisir une image aléatoire avec probabilité réduite pour les images "special"
    function getRandomImage(deviceType) {
        const imageList = images[deviceType];
        const specialChance = 0.1; // 10% de chance pour les images special
        const random = Math.random();

        // Sépare les images normales et spéciales
        const normalImages = imageList.filter(img => !img.startsWith('special'));
        const specialImages = imageList.filter(img => img.startsWith('special'));

        // Si le random est inférieur à specialChance ET qu'il y a des images spéciales
        if (random < specialChance && specialImages.length > 0) {
            // Choisit une image spéciale aléatoire
            return specialImages[Math.floor(Math.random() * specialImages.length)];
        } else {
            // Choisit une image normale aléatoire
            return normalImages[Math.floor(Math.random() * normalImages.length)];
        }
    }

    // Applique l'image de background
    function setRandomBackground() {
        const deviceType = isMobile() ? 'telephone' : 'pc';
        const selectedImage = getRandomImage(deviceType);
        const imagePath = `assets/images/${deviceType}/${selectedImage}`;

        // Applique le background au body
        document.body.style.backgroundImage = `url("${imagePath}")`;
        document.body.style.backgroundRepeat = 'no-repeat';
        document.body.style.backgroundPosition = 'center center';
        document.body.style.backgroundAttachment = 'fixed';
        document.body.style.backgroundSize = 'cover';

        console.log(`Image de background chargée: ${imagePath}`);
    }

    // Execute au chargement de la page
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setRandomBackground);
    } else {
        setRandomBackground();
    }
})();

