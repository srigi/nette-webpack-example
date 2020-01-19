import naja from 'naja';
import netteForms from 'nette-forms';


window.Nette = netteForms;

document.addEventListener('DOMContentLoaded', naja.initialize.bind(naja));
netteForms.initOnLoad();
