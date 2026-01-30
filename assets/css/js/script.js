// assets/js/script.js

// Mobile sidebar toggle
document.addEventListener('DOMContentLoaded', function() {
    // Toggle sidebar on mobile
    const sidebarToggle = document.createElement('button');
    sidebarToggle.innerHTML = '<i class="fas fa-bars"></i>';
    sidebarToggle.className = 'sidebar-toggle';
    sidebarToggle.style.cssText = `
        position: fixed;
        top: 15px;
        left: 15px;
        z-index: 1001;
        background: #FF9800;
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 18px;
        display: none;
        cursor: pointer;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    `;
    
    document.body.appendChild(sidebarToggle);
    
    // Show/hide sidebar on mobile
    sidebarToggle.addEventListener('click', function() {
        const sidebar = document.querySelector('.sidebar');
        const main = document.querySelector('.main');
        
        if (sidebar.style.display === 'none' || sidebar.style.display === '') {
            sidebar.style.display = 'block';
            main.style.marginLeft = '250px';
        } else {
            sidebar.style.display = 'none';
            main.style.marginLeft = '0';
        }
    });
    
    // Check screen size
    function checkScreenSize() {
        if (window.innerWidth <= 768) {
            sidebarToggle.style.display = 'flex';
            sidebarToggle.style.alignItems = 'center';
            sidebarToggle.style.justifyContent = 'center';
            document.querySelector('.sidebar').style.display = 'none';
            document.querySelector('.main').style.marginLeft = '0';
        } else {
            sidebarToggle.style.display = 'none';
            document.querySelector('.sidebar').style.display = 'block';
            document.querySelector('.main').style.marginLeft = '250px';
        }
    }
    
    checkScreenSize();
    window.addEventListener('resize', checkScreenSize);
    
    // Auto-hide alerts
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
    
    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let valid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    valid = false;
                    field.style.borderColor = '#F44336';
                    
                    // Add error message
                    if (!field.nextElementSibling || !field.nextElementSibling.classList.contains('error-message')) {
                        const error = document.createElement('div');
                        error.className = 'error-message';
                        error.style.cssText = 'color: #F44336; font-size: 12px; margin-top: 5px;';
                        error.textContent = 'Field ini wajib diisi';
                        field.parentNode.appendChild(error);
                    }
                } else {
                    field.style.borderColor = '';
                    const error = field.parentNode.querySelector('.error-message');
                    if (error) error.remove();
                }
            });
            
            if (!valid) {
                e.preventDefault();
                alert('Harap isi semua field yang wajib!');
            }
        });
    });
    
    // Search functionality
    const searchInputs = document.querySelectorAll('input[type="text"][placeholder*="Cari"]');
    searchInputs.forEach(input => {
        input.addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                const table = this.closest('.card-body').querySelector('table');
                if (table) {
                    const searchTerm = this.value.toLowerCase();
                    const rows = table.querySelectorAll('tbody tr');
                    
                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                }
            }
        });
    });
    
    // Print buttons
    const printButtons = document.querySelectorAll('.btn-success i.fa-print');
    printButtons.forEach(button => {
        button.closest('a').addEventListener('click', function(e) {
            e.preventDefault();
            window.print();
        });
    });
});

// Confirm delete
document.addEventListener('click', function(e) {
    if (e.target.closest('a[href*="hapus"]') || 
        (e.target.closest('button') && e.target.closest('button').textContent.includes('Hapus'))) {
        if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            e.preventDefault();
        }
    }
});

// Date picker enhancement
const dateInputs = document.querySelectorAll('input[type="date"]');
dateInputs.forEach(input => {
    input.min = '2020-01-01';
    input.max = new Date().toISOString().split('T')[0];
});