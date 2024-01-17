import './bootstrap.js';
import './styles/app.css';
import alienGreeting from './lib/alien-greeting.js'; // in webpack we don't need the extension, but in real JS we need

alienGreeting('Give us all your candy!', false);
console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
