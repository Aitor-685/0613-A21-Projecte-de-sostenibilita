let totsElsProductes = [];
let valoracioMinima = 0;

// Carregar productes
fetch('api/productes.php')
    .then(r => r.json())
    .then(productes => {
        totsElsProductes = productes;
        carregarCategories(productes);
        renderProductes(productes);
    })
    .catch(() => {
        document.getElementById('llistaProductes').innerHTML = '<p>Error en carregar els productes.</p>';
    });

function carregarCategories(productes) {
    const select = document.getElementById('filtreCategoria');
    const categories = [...new Set(productes.map(p => p.category))];
    categories.forEach(cat => {
        const option = document.createElement('option');
        option.value = cat;
        option.textContent = cat;
        select.appendChild(option);
    });
}

function renderProductes(productes) {
    const llista = document.getElementById('llistaProductes');
    document.getElementById('numResultats').textContent = productes.length + ' productes trobats';

    if (productes.length === 0) {
        llista.innerHTML = '<p class="no-resultats">Cap producte coincideix amb els filtres.</p>';
        return;
    }

    llista.innerHTML = '';
    productes.forEach(p => {
        const estrelles = generarEstrelles(p.rating?.rate ?? 0);
        const div = document.createElement('div');
        div.className = 'producte-mini';
        div.innerHTML = `
            <img src="${p.image}" alt="${p.title}">
            <div class="producte-mini-info">
                <p class="title">${p.title}</p>
                <span class="badge-categoria">${p.category}</span>
                <p class="preu">${parseFloat(p.price).toFixed(2)} €</p>
                <p class="rating">${estrelles} <small>(${p.rating?.count ?? 0} valoracions)</small></p>
            </div>
        `;
        llista.appendChild(div);
    });
}

function generarEstrelles(rate) {
    const plenes = Math.round(rate);
    return '⭐'.repeat(plenes) + '☆'.repeat(5 - plenes);
}

function aplicarFiltres() {
    const categoria = document.getElementById('filtreCategoria').value;
    const preuMax = parseFloat(document.getElementById('filtrePreu').value);

    const filtrats = totsElsProductes.filter(p => {
        const okCategoria = categoria === 'totes' || p.category === categoria;
        const okPreu = parseFloat(p.price) <= preuMax;
        const okValoracio = (p.rating?.rate ?? 0) >= valoracioMinima;
        return okCategoria && okPreu && okValoracio;
    });

    renderProductes(filtrats);
}

// Events
document.getElementById('filtreCategoria').addEventListener('change', aplicarFiltres);

document.getElementById('filtrePreu').addEventListener('input', function () {
    document.getElementById('valorPreu').textContent = this.value;
    aplicarFiltres();
});

document.querySelectorAll('.btn-estrella').forEach(btn => {
    btn.addEventListener('click', function () {
        document.querySelectorAll('.btn-estrella').forEach(b => b.classList.remove('actiu'));
        this.classList.add('actiu');
        valoracioMinima = parseFloat(this.dataset.valor);
        aplicarFiltres();
    });
});

document.getElementById('btnReset').addEventListener('click', () => {
    document.getElementById('filtreCategoria').value = 'totes';
    document.getElementById('filtrePreu').value = 1000;
    document.getElementById('valorPreu').textContent = '1000';
    valoracioMinima = 0;
    document.querySelectorAll('.btn-estrella').forEach(b => b.classList.remove('actiu'));
    renderProductes(totsElsProductes);
});