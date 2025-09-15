function waitMeShow(idForm) {
    $(idForm).waitMe({
        effect: 'stretch',
        text: '...Cargando...',
        bg: 'rgba(255,255,255,0.7)',
        color: '#4B02DF',
        sizeW: '',
        sizeH: '',
        source: ''
    });
};

function waitMeHide(idForm) {
    $(idForm).waitMe('hide');
}