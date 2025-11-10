@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')
<div class="homepage">
    <!-- Top Right Corner -->
    <div class="top-header d-flex px-3 py-3">
        <div class="left-title">
            <h3 class="">Carbon AI</h3>
            <h6 class="my-1">Powered by AI</>
        </div>
        <button class="dark-light-btn" id="themeToggle">
            <svg class="sun-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: block;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <svg class="moon-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>
    </div>

    <!-- Main Content -->
    <div class="home-main-content">
        <!-- Centered Content Container -->
        <div class="home-centered-content px-5">
            <div class="initial-content" id="initialContent">
                <!-- Welcome Section -->
                <div class="welcome-section">
                    <h1 class="welcome-title">
                        Welcome to Carbon AI
                    </h1>
                    <p class="welcome-subtitle">
                        Your conversational carbon accounting assistant — powered by AI.
                    </p>
                </div>

                <!-- Action Cards -->
                <div class="action-cards-grid">
                    <!-- Upload Documents -->
                    <div class="action-card">
                        <div class="action-card-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                        </div>
                        <h3 class="action-card-title">Upload Documents</h3>
                        <p class="action-card-description">Upload invoices — I'll sort them into Scopes 1-3.</p>
                    </div>

                    <!-- Review & Audit -->
                    <div class="action-card">
                        <div class="action-card-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="action-card-title">Review &amp; Audit</h3>
                        <p class="action-card-description">Verify data accuracy before final reporting.</p>
                    </div>

                    <!-- Generate Report -->
                    <div class="action-card">
                        <div class="action-card-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="action-card-title">Generate Report</h3>
                        <p class="action-card-description">Export reports aligned with ISSB, CDP, and SBTi.</p>
                    </div>

                    <!-- Connect Suppliers -->
                    <div class="action-card">
                        <div class="action-card-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="action-card-title">Connect Suppliers</h3>
                        <p class="action-card-description">Invite suppliers to share emissions data.</p>
                    </div>
                </div>
            </div>

            <div class="chat-ai-interface" id="chatInterface">
                <div class="chat-ai-panel">
                    <div class="chat-ai-thread" id="chatThread">
                        <div class="ai-message-card">
                            <p>I'm here to help you with carbon accounting. You can:</p>
                            <ul>
                                <li>Upload documents for processing</li>
                                <li>Ask about Scope 1, 2, or 3 categories</li>
                                <li>Set your reporting period and organizational boundary</li>
                                <li>Request analysis of uploaded documents</li>
                                <li>Ask questions about GHG Protocol methodology</li>
                            </ul>
                            <div class="ai-message-buttons">
                                <button type="button">Upload</button>
                                <button type="button">Review</button>
                                <button type="button">Report</button>
                            </div>
                            <span class="chat-timestamp">13:18</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Input Bar (Bottom) -->
    <div class="chat-bar-wrapper">
        <div class="chat-bar-container">
            <div class="chat-input-group">
                <button type="button" class="chat-attachment-btn" id="chatAttachmentBtn">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                </button>
                <input type="file" id="chatFileInput" style="display:none;" multiple>
                <input
                    type="text"
                    placeholder="Ask about scopes, upload documents, or request analysis..."
                    class="chat-input"
                    id="chatMessageInput"
                />
                <button type="button" class="chat-send-btn" id="chatSendBtn">
                    <span>Send</span>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </div>
            <div id="chatSelectedFiles" style="margin-top:0.5rem;font-size:0.75rem;color:#94a3b8;"></div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('themeToggle');
    const homepage = document.querySelector('.homepage');
    const homeMainContent = document.querySelector('.home-main-content');
    const topHeader = document.querySelector('.top-header');
    const sunIcon = themeToggle.querySelector('.sun-icon');
    const moonIcon = themeToggle.querySelector('.moon-icon');

    // Check for saved theme preference or default to dark mode
    const currentTheme = localStorage.getItem('theme') || 'dark';

    // Apply theme on page load
    if (currentTheme === 'light') {
        homepage.classList.add('light-mode');
        sunIcon.style.display = 'none';
        moonIcon.style.display = 'block';
    } else {
        homepage.classList.remove('light-mode');
        sunIcon.style.display = 'block';
        moonIcon.style.display = 'none';
    }

    // Toggle theme on button click
    themeToggle.addEventListener('click', function() {
        homepage.classList.toggle('light-mode');

        if (homepage.classList.contains('light-mode')) {
            localStorage.setItem('theme', 'light');
            sunIcon.style.display = 'none';
            moonIcon.style.display = 'block';
        } else {
            localStorage.setItem('theme', 'dark');
            sunIcon.style.display = 'block';
            moonIcon.style.display = 'none';
        }
    });

    const attachmentBtn = document.getElementById('chatAttachmentBtn');
    const chatFileInput = document.getElementById('chatFileInput');
    const selectedFilesDisplay = document.getElementById('chatSelectedFiles');
    const chatMessageInput = document.getElementById('chatMessageInput');
    const chatSendBtn = document.getElementById('chatSendBtn');
    const chatInterface = document.getElementById('chatInterface');
    const homeCenteredContent = document.querySelector('.home-centered-content');
    const initialContent = document.getElementById('initialContent');
    const chatThread = document.getElementById('chatThread');

    if (attachmentBtn && chatFileInput) {
        attachmentBtn.addEventListener('click', function(event) {
            event.preventDefault();
            chatFileInput.click();
        });

        chatFileInput.addEventListener('change', function() {
            if (!selectedFilesDisplay) {
                return;
            }

            if (this.files && this.files.length > 0) {
                const fileNames = Array.from(this.files).map(file => file.name);
                selectedFilesDisplay.textContent = `Attached: ${fileNames.join(', ')}`;
            } else {
                selectedFilesDisplay.textContent = '';
            }
        });
    }

    function showChatInterface() {
        if (initialContent) {
            initialContent.style.display = 'none';
        }
        if (chatInterface) {
            chatInterface.classList.add('active');
        }
    }

    if (chatSendBtn) {
        chatSendBtn.addEventListener('click', function() {
            if (!chatMessageInput || !chatFileInput) return;

            const message = chatMessageInput.value.trim();
            const files = chatFileInput.files;
            const hasMessage = message.length > 0;
            const hasFiles = files && files.length > 0;

            if (!hasMessage && !hasFiles) {
                return;
            }

            showChatInterface();

            const userWrapper = document.createElement('div');
            userWrapper.className = 'user-message-wrapper';

            if (hasMessage || hasFiles) {
                const avatar = document.createElement('div');
                avatar.className = 'user-avatar';
                const initialsSource = hasMessage ? message : (files && files.length ? files[0].name : 'me');
                avatar.textContent = initialsSource.trim().slice(0, 2).toLowerCase();
                userWrapper.appendChild(avatar);
            }

            if (hasMessage) {
                const messageBubble = document.createElement('div');
                messageBubble.className = 'user-message-bubble';
                messageBubble.textContent = message;
                userWrapper.appendChild(messageBubble);
            }

            if (hasFiles) {
                const attachmentsContainer = document.createElement('div');
                attachmentsContainer.className = 'user-attachments';
                attachmentsContainer.style.display = 'flex';

                Array.from(files).forEach(file => {
                    const chip = document.createElement('div');
                    chip.className = 'user-attachment-item';
                    chip.textContent = file.name;
                    attachmentsContainer.appendChild(chip);
                });

                userWrapper.appendChild(attachmentsContainer);
            }

            const timestamp = document.createElement('span');
            timestamp.className = 'chat-timestamp user-timestamp';
            timestamp.textContent = 'Just now';
            userWrapper.appendChild(timestamp);

            if (chatThread) {
                chatThread.insertBefore(userWrapper, chatThread.firstChild);
            }

            chatMessageInput.value = '';
            chatFileInput.value = '';
            if (selectedFilesDisplay) {
                selectedFilesDisplay.textContent = '';
            }
        });
    }
});
</script>
@endsection

