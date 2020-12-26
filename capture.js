const captureWebsite = require('capture-website');

(async () => {
    await captureWebsite.file(process.argv[2], process.argv[3]+'-desktop.png');
})();

(async () => {
    await captureWebsite.file(process.argv[2], process.argv[3]+'-full.png', {
        fullPage: true
    });
})();

(async () => {
    await captureWebsite.file(process.argv[2], process.argv[3]+'-mobile.png', {
        emulateDevice: 'iPhone X'
    });
})();

(async () => {
    await captureWebsite.file(process.argv[2], process.argv[3]+'-tab.png', {
        emulateDevice: 'iPad landscape'
    });
})();

// console.log(process.argv);
