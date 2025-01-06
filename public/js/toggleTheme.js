// Dark Mode
const backgroundColorDarkMode = '#11111D';
const textColorDarkMode = '#E9EDF3';
const cardColorDarkMode = '#1C1C27';
const hoverTableDarkMode = '#1C1C35';

// Light Mode
const backgroundColorLightMode = '#E9E9E9';
const textColorLightMode = 'black';
const cardColorLightMode = '#F5F5F5';

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

    body.style.color = textColorDarkMode;

    body.style.backgroundColor = backgroundColorDarkMode;

    cards.forEach(card => {
      card.style.backgroundColor = cardColorDarkMode;
    });

    sidebar.style.backgroundColor = cardColorDarkMode;
    links.forEach(link => {
      link.style.color = textColorDarkMode;
    });

    svgs.forEach(svg => {
      svg.style.fill = textColorDarkMode;
    });

    toggleWrapper.style.backgroundColor = cardColorDarkMode;

    activeElements.forEach(element => {
      element.style.color = cardColorDarkMode;
    });

    sidebarLinks.forEach(link => {
      link.addEventListener('mouseover', () => {
        if (!link.classList.contains('active')) {
          link.style.color = cardColorDarkMode;
        }
      });

      link.addEventListener('mouseout', () => {
        if (!link.classList.contains('active')) {
          link.style.color = textColorDarkMode;
        }
      });
    });

    hoverTables.forEach(hoverTable => {
      hoverTable.addEventListener('mouseover', () => {
        hoverTable.style.backgroundColor = hoverTableDarkMode;
      });

      hoverTable.addEventListener('mouseout', () => {
        hoverTable.style.backgroundColor = cardColorDarkMode;
      });
    });


    settingsDropdown.style.backgroundColor = cardColorDarkMode;

    inputs.forEach(input => {
      input.style.backgroundColor = hoverTableDarkMode;
      input.style.color = 'white';
    });

    closeBtnSidebar.style.color = 'white';

  } else { // Light Mode

    checkbox.checked = false;

    body.style.color = textColorLightMode;

    body.style.backgroundColor = backgroundColorLightMode;

    cards.forEach(card => {
      card.style.backgroundColor = cardColorLightMode;
    });

    sidebar.style.backgroundColor = cardColorLightMode;
    links.forEach(link => {
      link.style.color = textColorLightMode;
    });

    toggleWrapper.style.backgroundColor = backgroundColorLightMode;

    sidebarLinks.forEach(link => {
      link.addEventListener('mouseover', () => {
        if (!link.classList.contains('active')) {
          link.style.color = textColorLightMode;
        }
      });

      link.addEventListener('mouseout', () => {
        if (!link.classList.contains('active')) {
          link.style.color = cardColorDarkMode;
        }
      });
    });

    hoverTables.forEach(hoverTable => {
      hoverTable.addEventListener('mouseover', () => {
        hoverTable.style.backgroundColor = textColorDarkMode;
      });

      hoverTable.addEventListener('mouseout', () => {
        hoverTable.style.backgroundColor = cardColorLightMode;
      });
    });

    settingsDropdown.style.backgroundColor = cardColorLightMode;

    buttons.forEach(button => {
      button.style.color = textColorDarkMode;
    });

    inputs.forEach(input => {
      input.style.backgroundColor = 'white';
      input.style.color = textColorLightMode;
    });

    closeBtnSidebar.style.color = 'black';
  }

  // Event listener untuk checkbox
  checkbox.addEventListener('change', () => {
    // Dark Mode
    if (checkbox.checked) {

      body.style.color = textColorDarkMode;

      body.style.backgroundColor = backgroundColorDarkMode;

      hoverTables.forEach(hoverTable => {
        hoverTable.style.backgroundColor = cardColorDarkMode; // Default warna untuk dark mode
      });

      cards.forEach(card => {
        card.style.backgroundColor = cardColorDarkMode;
      });

      sidebar.style.backgroundColor = cardColorDarkMode;

      links.forEach(link => {
        link.style.color = textColorDarkMode;
      });

      toggleWrapper.style.backgroundColor = cardColorDarkMode;

      activeElements.forEach(element => {
        element.style.color = cardColorDarkMode;
      });

      hoverTables.forEach(hoverTable => {
        hoverTable.addEventListener('mouseover', () => {
          hoverTable.style.backgroundColor = hoverTableDarkMode;
        });

        hoverTable.addEventListener('mouseout', () => {
          hoverTable.style.backgroundColor = cardColorDarkMode;
        });
      });

      sidebarLinks.forEach(link => {
        link.addEventListener('mouseover', () => {
          if (!link.classList.contains('active')) {
            link.style.color = cardColorDarkMode;
          }
        });

        link.addEventListener('mouseout', () => {
          if (!link.classList.contains('active')) {
            link.style.color = cardColorLightMode;
          }
        });
      });

      settingsDropdown.style.backgroundColor = cardColorDarkMode;

      inputs.forEach(input => {
        input.style.backgroundColor = hoverTableDarkMode;
        input.style.color = 'white';
      });

      closeBtnSidebar.style.color = 'white';

      localStorage.setItem('theme', 'dark');

    } else { // Light Mode

      body.style.color = textColorLightMode;

      hoverTables.forEach(hoverTable => {
        hoverTable.style.backgroundColor = cardColorLightMode; // Default warna untuk light mode
      });

      body.style.backgroundColor = backgroundColorLightMode;
      cards.forEach(card => {
        card.style.backgroundColor = cardColorLightMode;
      });

      sidebar.style.backgroundColor = cardColorLightMode;
      links.forEach(link => {
        link.style.color = textColorLightMode;
      });
      toggleWrapper.style.backgroundColor = backgroundColorLightMode;

      sidebarLinks.forEach(link => {
        link.addEventListener('mouseover', () => {
          if (!link.classList.contains('active')) {
            link.style.color = textColorLightMode;
          }
        });

        link.addEventListener('mouseout', () => {
          if (!link.classList.contains('active')) {
            link.style.color = cardColorDarkMode;
          }
        });
      });

      settingsDropdown.style.backgroundColor = cardColorLightMode;

      buttons.forEach(button => {
        button.style.color = textColorDarkMode;
      });

      hoverTables.forEach(hoverTable => {
        hoverTable.addEventListener('mouseover', () => {
          hoverTable.style.backgroundColor = textColorDarkMode;
        });

        hoverTable.addEventListener('mouseout', () => {
          hoverTable.style.backgroundColor = cardColorLightMode;
        });
      });

      inputs.forEach(input => {
        input.style.backgroundColor = 'white';
        input.style.color = textColorLightMode;
      });

      closeBtnSidebar.style.color = 'black';

      localStorage.setItem('theme', 'light');
    }
  });
});
