@extends('admin.dashboard.index')

@section('admin-content')

<div class="min-h-screen bg-gray-50">
    <div class="mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h1 class="text-3xl font-bold text-gray-900">Category Management</h1>
                    <p class="mt-1 text-sm text-gray-500">Organize and manage your category hierarchy with main categories, subcategories, and sub-subcategories</p>
                </div>
                <div class="mt-4 md:mt-0 md:ml-4">
                    <button onclick="openCreateModal(1)" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Main Category
                    </button>
                </div>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 rounded-md bg-green-50 p-4 border border-green-200">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Statistics Cards -->
        <div class="mb-8">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-blue-50">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7l-2 7m-5-6v6m-2-6v6m-3-2l4-4m3 4l-4-4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Main Categories</dt>
                                    <dd class="text-lg font-medium text-gray-900">{{ count($mainCategories) }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-blue-50">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Sub Categories</dt>
                                    <dd class="text-lg font-medium text-gray-900">{{ $mainCategories->sum(function($cat) { return $cat->subCategories->count(); }) }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-blue-50">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2V9a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Sub-Sub Categories</dt>
                                    <dd class="text-lg font-medium text-gray-900">{{ $mainCategories->sum(function($cat) { return $cat->subCategories->sum(function($sub) { return $sub->subSubCategories->count(); }); }) }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Hierarchy -->
        <div class="bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-lg font-medium text-gray-900">Category Hierarchy</h3>
                <p class="mt-1 text-sm text-gray-500">Manage your complete category structure</p>
            </div>

            <div class="divide-y divide-gray-200">
                @forelse($mainCategories as $mainCategory)
                <div class="category-section" data-category-id="{{ $mainCategory->id }}">
                    <!-- Main Category -->
                    <div class="group bg-white hover:bg-gray-50 transition-colors duration-200">
                        <div class="flex items-center justify-between px-6 py-4">
                            <div class="flex items-center space-x-4 flex-1 cursor-pointer" onclick="toggleCategory({{ $mainCategory->id }})">
                                <div class="flex-shrink-0">
                                    <button class="flex items-center justify-center h-6 w-6 rounded transition-transform duration-200" 
                                            id="toggle-icon-{{ $mainCategory->id }}">
                                        <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex-shrink-0">
                                    @if($mainCategory->icon_image)
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset($mainCategory->icon_image) }}" alt="{{ $mainCategory->name }}" class="h-8 w-8 rounded-full object-cover">
                                        </div>
                                    @else
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-blue-100">
                                                <svg class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900">{{ $mainCategory->name }}</h4>
                                    <p class="text-sm text-gray-500">
                                        {{ $mainCategory->subCategories->count() }} subcategories
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <button onclick="openCreateModal(2, {{ $mainCategory->id }})" 
                                        class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                    <svg class="-ml-0.5 mr-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Add Sub
                                </button>
                                <button onclick="openEditModal({{ $mainCategory->id }}, '{{ $mainCategory->name }}')" 
                                        class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                                    <svg class="-ml-0.5 mr-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </button>
                                <button onclick="deleteCategory({{ $mainCategory->id }})" 
                                        class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                    <svg class="-ml-0.5 mr-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sub Categories -->
                    <div class="subcategories" id="subcategories-{{ $mainCategory->id }}" style="max-height: none; overflow: hidden; transition: max-height 0.3s ease-out;">
                    @foreach($mainCategory->subCategories as $subCategory)
                    <div class="ml-8 border-l-2 border-gray-100">
                        <div class="group bg-white hover:bg-gray-50 transition-colors duration-200">
                            <div class="flex items-center justify-between px-6 py-3 relative">
                                <div class="absolute left-0 top-1/2 w-4 h-px bg-gray-300 -translate-y-1/2"></div>
                                <div class="flex items-center space-x-3">
                                    @if($subCategory->icon_image)
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset($subCategory->icon_image) }}" alt="{{ $subCategory->name }}" class="h-8 w-8 rounded-full object-cover">
                                        </div>
                                    @else
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-6 w-6 rounded-full bg-gray-100">
                                            <svg class="h-3 w-3 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                            </svg>
                                        </div>
                                    </div>
                                    @endif
                                    <div>
                                        <h5 class="font-medium text-gray-800">{{ $subCategory->name }}</h5>
                                        <p class="text-xs text-gray-500">
                                            {{ $subCategory->subSubCategories->count() }} sub-subcategories
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                    <button onclick="openCreateModal(3, {{ $subCategory->id }})" 
                                            class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">
                                        <svg class="-ml-0.5 mr-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Add Sub-Sub
                                    </button>
                                    <button onclick="openEditModal({{ $subCategory->id }}, '{{ $subCategory->name }}')" 
                                            class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-green-700 bg-green-50 hover:bg-green-100 transition-colors">
                                        <svg class="-ml-0.5 mr-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button onclick="deleteCategory({{ $subCategory->id }})" 
                                            class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-red-700 bg-red-50 hover:bg-red-100 transition-colors">
                                        <svg class="-ml-0.5 mr-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Sub-Sub Categories -->
                        @foreach($subCategory->subSubCategories as $subSubCategory)
                        <div class="ml-8 border-l-2 border-gray-100">
                            <div class="group bg-white hover:bg-gray-50 transition-colors duration-200">
                                <div class="flex items-center justify-between px-6 py-2 relative">
                                    <div class="absolute left-0 top-1/2 w-4 h-px bg-gray-300 -translate-y-1/2"></div>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center h-4 w-4 rounded bg-gray-50">
                                                <div class="h-1 w-1 rounded-full bg-gray-400"></div>
                                            </div>
                                        </div>
                                        <span class="text-sm text-gray-700">{{ $subSubCategory->name }}</span>
                                    </div>
                                    <div class="flex items-center space-x-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <button onclick="openEditModal({{ $subSubCategory->id }}, '{{ $subSubCategory->name }}')" 
                                                class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-green-700 bg-green-50 hover:bg-green-100 transition-colors">
                                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button onclick="deleteCategory({{ $subSubCategory->id }})" 
                                                class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-red-700 bg-red-50 hover:bg-red-100 transition-colors">
                                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <div class="mx-auto h-12 w-12 flex items-center justify-center rounded-full bg-gray-100">
                        <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7l-2 7m-5-6v6m-2-6v6m-3-2l4-4m3 4l-4-4" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-medium text-gray-900">No categories</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating your first main category.</p>
                    <div class="mt-6">
                        <button onclick="openCreateModal(1)" 
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add Main Category
                        </button>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Modals -->
    @include('admin.dashboard.category.modals')
</div>

<script>
function openCreateModal(level, parentId = null) {
    document.getElementById('createCategoryLevel').value = level;
    document.getElementById('createCategoryParentId').value = parentId || '';
    document.getElementById('createCategoryModal').classList.remove('hidden');
    
    // Set the title based on level
    const titles = {
        1: 'Create Main Category',
        2: 'Create Sub Category',
        3: 'Create Sub-Sub Category'
    };
    document.getElementById('createModalTitle').textContent = titles[level] || 'Create Category';
    
    // Focus on the input field
    setTimeout(() => {
        document.getElementById('createCategoryName')?.focus();
    }, 100);
}

function closeCreateModal() {
    document.getElementById('createCategoryModal').classList.add('hidden');
    document.getElementById('createCategoryForm').reset();
}

function openEditModal(id, name) {
    document.getElementById('editCategoryId').value = id;
    document.getElementById('editCategoryName').value = name;
    document.getElementById('editCategoryModal').classList.remove('hidden');
    document.getElementById('editCategoryForm').action = `/admin/categories/${id}`;
    
    // Focus on the input field and select text
    setTimeout(() => {
        const input = document.getElementById('editCategoryName');
        if (input) {
            input.focus();
            input.select();
        }
    }, 100);
}

function closeEditModal() {
    document.getElementById('editCategoryModal').classList.add('hidden');
    document.getElementById('editCategoryForm').reset();
}

function deleteCategory(id) {
    // Create a more professional confirmation dialog
    const confirmed = confirm('Are you sure you want to delete this category?\n\nThis action will permanently delete the category and all of its subcategories. This cannot be undone.');
    
    if (confirmed) {
        const form = document.getElementById('deleteCategoryForm');
        form.action = `/admin/categories/${id}`;
        form.submit();
    }
}

// Close modals when clicking outside
document.addEventListener('click', function(event) {
    const createModal = document.getElementById('createCategoryModal');
    const editModal = document.getElementById('editCategoryModal');
    
    if (event.target === createModal) {
        closeCreateModal();
    }
    if (event.target === editModal) {
        closeEditModal();
    }
});

// Close modals with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeCreateModal();
        closeEditModal();
    }
});

// Prevent modal close when clicking inside modal content
document.querySelectorAll('.modal-content').forEach(modal => {
    modal.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});

// Add smooth animations for category sections
document.addEventListener('DOMContentLoaded', function() {
    const categorySection = document.querySelectorAll('.category-section');
    categorySection.forEach((section, index) => {
        section.style.animationDelay = `${index * 0.1}s`;
        section.classList.add('animate-fade-in-up');
    });
});

// Toggle category collapse/expand functionality
function toggleCategory(categoryId) {
    const subcategoriesDiv = document.getElementById(`subcategories-${categoryId}`);
    const toggleIcon = document.getElementById(`toggle-icon-${categoryId}`);
    const svg = toggleIcon.querySelector('svg');
    
    if (!subcategoriesDiv) return;
    
    const isCollapsed = subcategoriesDiv.style.maxHeight === '0px';
    
    if (isCollapsed) {
        // Expand
        subcategoriesDiv.style.maxHeight = subcategoriesDiv.scrollHeight + 'px';
        svg.style.transform = 'rotate(0deg)';
        subcategoriesDiv.style.opacity = '1';
        
        // Reset max-height after animation completes
        setTimeout(() => {
            if (subcategoriesDiv.style.maxHeight !== '0px') {
                subcategoriesDiv.style.maxHeight = 'none';
            }
        }, 300);
    } else {
        // Collapse
        subcategoriesDiv.style.maxHeight = subcategoriesDiv.scrollHeight + 'px';
        subcategoriesDiv.offsetHeight; // Force reflow
        subcategoriesDiv.style.maxHeight = '0px';
        svg.style.transform = 'rotate(-90deg)';
        subcategoriesDiv.style.opacity = '0.3';
    }
}

// Initialize collapsed state for categories with many subcategories (optional)
document.addEventListener('DOMContentLoaded', function() {
    // You can auto-collapse categories with more than X subcategories
    document.querySelectorAll('.subcategories').forEach(function(subcategoriesDiv) {
        const subcategoryCount = subcategoriesDiv.querySelectorAll('.ml-8.border-l-2').length;
        
        // Auto-collapse if more than 5 subcategories (optional)
        if (subcategoryCount > 5) {
            const categoryId = subcategoriesDiv.id.replace('subcategories-', '');
            // Uncomment the line below if you want auto-collapse for large categories
            // toggleCategory(categoryId);
        }
    });
});
</script>

<style>
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.3s ease-out forwards;
}

/* Smooth transitions for collapsible subcategories */
.subcategories {
    transition: max-height 0.3s ease-out, opacity 0.2s ease-out;
}

/* Hover effect for clickable main category header */
.cursor-pointer:hover h4 {
    color: #1e40af;
}
</style>


@endsection