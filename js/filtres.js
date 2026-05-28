let totsElsProductes = [];
let valoracioMinima = 0;

fetch('/api/productes.php')
    .then(r => r.json())
    .then(productes => {
        totsElsProductes = productes;
        carregarCategories(productes);
        renderProductes(productes);
    })
    .catch(() => {
        document.getElementById('llistaProductes').innerHTML = '<p>Error en carregar els productes.</p>';
    });

// Carregar categories als selects del formulari
fetch('/api/productes.php?categories=all')
    .then(r => r.json())
    .then(categories => {
        categoriesData = categories;
        ['selectCategoriaCrear', 'editCategoriaId'].forEach(id => {
            const sel = document.getElementById(id);
            if (!sel) return;
            categories.forEach(cat => {
                const opt = document.createElement('option');
                opt.value = cat.id;
                opt.textContent = cat.nom;
                sel.appendChild(opt);
            });
        });
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

        if (esAdmin) {
            const adminDiv = document.createElement('div');
            adminDiv.className = 'admin-accions';

            const editarBtn = document.createElement('button');
            editarBtn.type = 'button';
            editarBtn.className = 'btn-editar';
            editarBtn.textContent = '✏️ Editar';
            editarBtn.addEventListener('click', () => {
                window.location.href = `/view/editarProducts.php?id=${encodeURIComponent(p.id)}`;
            });

            const eliminarForm = document.createElement('form');
            eliminarForm.action = '/controller/productes/router.php';
            eliminarForm.method = 'POST';
            eliminarForm.style.display = 'inline';
            eliminarForm.addEventListener('submit', event => {
                if (!confirm('Segur que vols eliminar aquest producte?')) {
                    event.preventDefault();
                }
            });

            const accionInput = document.createElement('input');
            accionInput.type = 'hidden';
            accionInput.name = 'accio';
            accionInput.value = 'eliminar';

            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id';
            idInput.value = p.id;

            const eliminarBtn = document.createElement('button');
            eliminarBtn.type = 'submit';
            eliminarBtn.className = 'btn-eliminar';
            eliminarBtn.textContent = '🗑️ Eliminar';

            eliminarForm.appendChild(accionInput);
            eliminarForm.appendChild(idInput);
            eliminarForm.appendChild(eliminarBtn);

            adminDiv.appendChild(editarBtn);
            adminDiv.appendChild(eliminarForm);
            div.querySelector('.producte-mini-info').appendChild(adminDiv);
        }

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

// ── Funcions Admin ───────────────────────────────────────────────
function obrirFormCrear() {
    document.getElementById('formCrear').style.display = 'block';
    document.getElementById('formCrear').scrollIntoView({ behavior: 'smooth' });
}

function tancarFormCrear() {
    document.getElementById('formCrear').style.display = 'none';
}
