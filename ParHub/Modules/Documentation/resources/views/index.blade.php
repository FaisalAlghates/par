<x-documentation::components.layouts.master>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">My Documents</h1>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        Manage your uploaded documents and generated presentations
                    </p>
                </div>
                <a href="{{ route('documentation.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Upload New Document
                </a>
            </div>

            @if($documents->count() > 0)
                <!-- Documents Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($documents as $document)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                            <!-- Document Info -->
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                        {{ $document->title }}
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                        {{ $document->description ?? 'No description' }}
                                    </p>
                                </div>
                                
                                <!-- Status Badge -->
                                <span class="px-2 py-1 text-xs rounded-full 
                                    @if($document->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                    @elseif($document->status === 'processing') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                    @elseif($document->status === 'failed') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                    @else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200 @endif">
                                    {{ ucfirst($document->status) }}
                                </span>
                            </div>

                            <!-- File Info -->
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>{{ $document->file_name }}</span>
                                <span class="ml-2">({{ $document->file_size_formatted }})</span>
                            </div>

                            <!-- Slides Count -->
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <span>{{ $document->slides->count() }} slides generated</span>
                            </div>

                            <!-- Date -->
                            <div class="text-xs text-gray-400 dark:text-gray-500 mb-4">
                                Created {{ $document->created_at->diffForHumans() }}
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-2">
                                @if($document->status === 'completed')
                                    <a href="{{ route('documentation.show', $document) }}" 
                                       class="flex-1 text-center px-3 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                        View Presentation
                                    </a>
                                @endif
                                
                                <form method="POST" action="{{ route('documentation.destroy', $document) }}" 
                                      onsubmit="return confirm('Are you sure you want to delete this document?')" 
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 transition-colors">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $documents->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-12">
                    <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No documents yet</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Upload your first document to start creating AI-powered presentations
                    </p>
                    <a href="{{ route('documentation.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        Upload Your First Document
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-documentation::components.layouts.master>
