const COLORS = {
    verd1: '#2d6a4f', verd2: '#40916c', verd3: '#52b788',
    verd4: '#74c69d', verd5: '#95d5b2', verd6: '#b7e4c7',
    gris:  '#f0f4f0', vermell: '#e74c3c', taronja: '#e67e22',
    blau:  '#3498db'
};

const PALETA = [COLORS.verd1, COLORS.verd2, COLORS.verd3,
                COLORS.verd4, COLORS.verd5, COLORS.verd6];

// Configuració per tipus de gràfic
function buildConfig(dades) {
    const { tipus, labels, datasets, titol } = dades;

    switch (tipus) {
        case 'line':
            return {
                type: 'line',
                data: {
                    labels,
                    datasets: datasets.map((ds, i) => ({
                        label: ds.label,
                        data: ds.data,
                        borderColor: PALETA[i],
                        backgroundColor: PALETA[i] + '22',
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: PALETA[i],
                        pointRadius: 4
                    }))
                },
                options: {
                    responsive: true,
                    plugins: { legend: { position: 'top' } },
                    scales: { y: { beginAtZero: false } }
                }
            };

        case 'bar':
            return {
                type: 'bar',
                data: {
                    labels,
                    datasets: datasets.map((ds, i) => ({
                        label: ds.label,
                        data: ds.data,
                        backgroundColor: ds.data.map((_, j) => PALETA[j % PALETA.length]),
                        borderRadius: 8
                    }))
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: datasets.length > 1 } }
                }
            };

        case 'doughnut':
            return {
                type: 'doughnut',
                data: {
                    labels,
                    datasets: datasets.map((ds, i) => ({
                        label: ds.label,
                        data: ds.data,
                        backgroundColor: PALETA.slice(i * 2, i * 2 + ds.data.length),
                        borderWidth: 2
                    }))
                },
                options: {
                    responsive: true,
                    plugins: { legend: { position: 'bottom' } }
                }
            };
    }
}

// Renderitza un gràfic al canvas indicat
async function renderGrafic(canvasId, nomGrafic) {
    try {
        const res = await fetch(`/api/router.php?tipus=sostenibilitat&grafic=${nomGrafic}`);
        const dades = await res.json();

        if (dades.error) {
            console.error(`Error gràfic ${nomGrafic}:`, dades.error);
            return;
        }

        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        new Chart(canvas, buildConfig(dades));

    } catch (err) {
        console.error(`Error carregant ${nomGrafic}:`, err);
    }
}

// Carregar tots els gràfics de la pàgina
document.addEventListener('DOMContentLoaded', () => {
    renderGrafic('graficUrbanitzacio', 'urbanitzacio');
    renderGrafic('graficBarris',       'barris');
    renderGrafic('graficTransport',    'transport');
    renderGrafic('graficEnergies',     'energies');
    renderGrafic('graficAire',         'qualitat_aire');
    renderGrafic('graficCO2',          'emissions_co2');
});