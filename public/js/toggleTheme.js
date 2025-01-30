// Dark Mode
const backgroundDark = '#11111D';
const textDarkMode = '#E9EDF3';
const cardDarkMode = '#1C1C27';
const hoverTableDarkMode = '#1C1C35';

// Light Mode
const backgroundLight = '#E9E9E9';
const textLightMode = 'black';
const cardLightMode = '#F5F5F5';
const sidebarLightMode = '#13111E';

document.addEventListener('DOMContentLoaded', () => {
  const checkbox = document.getElementById('checkbox'); // Button toggle
  const body = document.body; // Body (all)
  const cards = document.querySelectorAll('.card');
  const sidebar = document.getElementById('sidebar');
  const links = document.querySelectorAll('a');
  const svgs = document.querySelectorAll('svg');
  const toggleWrapper = document.getElementById('toggle-wrapper');
  const activeElements = document.querySelectorAll('.sidebar-links .active');
  const sidebarLinks = document.querySelectorAll('.sidebar-links a');
  const sidebarh1 = document.querySelectorAll('.sidebar-links li h1');
  const settingsDropdown = document.getElementById('settings-dropdown');
  const buttons = document.querySelectorAll('.btn');
  const hoverTables = document.querySelectorAll('.table tbody tr');
  const inputs = document.querySelectorAll('.form-control, .form-select');
  const closeBtnSidebar = document.getElementById('close');



  // Inisialisasi tema saat halaman dimuat
  const theme = localStorage.getItem('theme');
  // Dark Mode
  if (theme === 'dark') {

    checkbox.checked = true;

    body.style.color = textDarkMode;

    body.style.backgroundColor = backgroundDark;

    cards.forEach(card => {
      card.style.backgroundColor = cardDarkMode;
    });

    sidebar.style.backgroundColor = cardDarkMode;
    links.forEach(link => {
      link.style.color = textDarkMode;
    });

    svgs.forEach(svg => {
      svg.style.fill = textDarkMode;
    });

    toggleWrapper.style.backgroundColor = cardDarkMode;

    activeElements.forEach(element => {
      element.style.color = textLightMode;
    });

    sidebarLinks.forEach(link => {
      link.addEventListener('mouseover', () => {
        if (!link.classList.contains('active')) {
          link.style.color = cardDarkMode;
        }
      });

      link.addEventListener('mouseout', () => {
        if (!link.classList.contains('active')) {
          link.style.color = textDarkMode;
        }
      });
    });

    hoverTables.forEach(hoverTable => {
      hoverTable.addEventListener('mouseover', () => {
        hoverTable.style.backgroundColor = hoverTableDarkMode;
      });

      hoverTable.addEventListener('mouseout', () => {
        hoverTable.style.backgroundColor = cardDarkMode;
      });
    });


    settingsDropdown.style.backgroundColor = cardDarkMode;

    inputs.forEach(input => {
      input.style.backgroundColor = hoverTableDarkMode;
      input.style.color = 'white';
    });

    closeBtnSidebar.style.color = 'white';

  } else { // Light Mode

    checkbox.checked = false;

    body.style.color = textLightMode;

    body.style.backgroundColor = backgroundLight;

    cards.forEach(card => {
      card.style.backgroundColor = cardLightMode;
    });

    sidebar.style.backgroundColor = sidebarLightMode;
    links.forEach(link => {
      link.style.color = textDarkMode;
    });

    sidebarh1.forEach(link => {
      link.style.color = textDarkMode;
    });

    toggleWrapper.style.backgroundColor = backgroundLight;

    activeElements.forEach(element => {
      element.style.color = textLightMode;
    });

    sidebarLinks.forEach(link => {
      link.addEventListener('mouseover', () => {
        if (!link.classList.contains('active')) {
          link.style.color = textLightMode;
        }
      });

      link.addEventListener('mouseout', () => {
        if (!link.classList.contains('active')) {
          link.style.color = textDarkMode;
        }
      });
    });

    hoverTables.forEach(hoverTable => {
      hoverTable.addEventListener('mouseover', () => {
        hoverTable.style.backgroundColor = textDarkMode;
      });

      hoverTable.addEventListener('mouseout', () => {
        hoverTable.style.backgroundColor = cardLightMode;
      });
    });

    settingsDropdown.style.backgroundColor = sidebarLightMode;

    buttons.forEach(button => {
      button.style.color = textDarkMode;
    });

    inputs.forEach(input => {
      input.style.backgroundColor = 'white';
      input.style.color = textLightMode;
    });

    closeBtnSidebar.style.color = 'black';
  }

  // Event listener untuk checkbox
  checkbox.addEventListener('change', () => {
    // Dark Mode
    if (checkbox.checked) {

      body.style.color = textDarkMode;

      body.style.backgroundColor = backgroundDark;

      hoverTables.forEach(hoverTable => {
        hoverTable.style.backgroundColor = cardDarkMode; // Default warna untuk dark mode
      });

      cards.forEach(card => {
        card.style.backgroundColor = cardDarkMode;
      });

      sidebar.style.backgroundColor = cardDarkMode;

      links.forEach(link => {
        link.style.color = textDarkMode;
      });

      toggleWrapper.style.backgroundColor = cardDarkMode;

      activeElements.forEach(element => {
        element.style.color = cardDarkMode;
      });

      hoverTables.forEach(hoverTable => {
        hoverTable.addEventListener('mouseover', () => {
          hoverTable.style.backgroundColor = hoverTableDarkMode;
        });

        hoverTable.addEventListener('mouseout', () => {
          hoverTable.style.backgroundColor = cardDarkMode;
        });
      });

      sidebarLinks.forEach(link => {
        link.addEventListener('mouseover', () => {
          if (!link.classList.contains('active')) {
            link.style.color = cardDarkMode;
          }
        });

        link.addEventListener('mouseout', () => {
          if (!link.classList.contains('active')) {
            link.style.color = cardLightMode;
          }
        });
      });

      settingsDropdown.style.backgroundColor = cardDarkMode;

      inputs.forEach(input => {
        input.style.backgroundColor = hoverTableDarkMode;
        input.style.color = 'white';
      });

      closeBtnSidebar.style.color = 'white';

      localStorage.setItem('theme', 'dark');

    } else { // Light Mode

      checkbox.checked = false;

      body.style.color = textLightMode;

      body.style.backgroundColor = backgroundLight;

      cards.forEach(card => {
        card.style.backgroundColor = cardLightMode;
      });

      sidebar.style.backgroundColor = sidebarLightMode;
      links.forEach(link => {
        link.style.color = textDarkMode;
      });

      sidebarh1.forEach(link => {
        link.style.color = textDarkMode;
      });

      toggleWrapper.style.backgroundColor = backgroundLight;

      activeElements.forEach(element => {
        element.style.color = textLightMode;
      });

      sidebarLinks.forEach(link => {
        link.addEventListener('mouseover', () => {
          if (!link.classList.contains('active')) {
            link.style.color = textLightMode;
          }
        });

        link.addEventListener('mouseout', () => {
          if (!link.classList.contains('active')) {
            link.style.color = textDarkMode;
          }
        });
      });

      hoverTables.forEach(hoverTable => {
        hoverTable.style.backgroundColor = cardLightMode; // Default warna untuk dark mode
      });

      hoverTables.forEach(hoverTable => {
        hoverTable.addEventListener('mouseover', () => {
          hoverTable.style.backgroundColor = textDarkMode;
        });

        hoverTable.addEventListener('mouseout', () => {
          hoverTable.style.backgroundColor = cardLightMode;
        });
      });

      settingsDropdown.style.backgroundColor = sidebarLightMode;

      buttons.forEach(button => {
        button.style.color = textDarkMode;
      });

      inputs.forEach(input => {
        input.style.backgroundColor = 'white';
        input.style.color = textLightMode;
      });

      closeBtnSidebar.style.color = 'black';

      localStorage.setItem('theme', 'light');
    }
  });
});
