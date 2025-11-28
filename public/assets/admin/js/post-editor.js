// Initialize Editor.js after all scripts are loaded
document.addEventListener("DOMContentLoaded", function () {

    const editor = new EditorJS({
        holder: 'editorjs',
        autofocus: true,
        data: editorData,
        tools: {
            header: {
                class: Header,
                inlineToolbar: ['link'],
                config: {
                    placeholder: 'Enter a header',
                    levels: [2, 3, 4],
                    defaultLevel: 3
                }
            },
            list: {
                class: EditorjsList,
                inlineToolbar: true,
                config: {
                    maxLevel: 2
                }
            },
            youtube: YouTubeEmbed,
            image: {
                class: ImageTool,
                config: {
                    endpoints: {
                        byFile: '/admin/ajax/post-image', // Your backend file uploader endpoint
                    }
                }
            },
        },
        placeholder: 'Start writing your content here...'
    });

    // Save button
    document.getElementById('saveBtn').addEventListener('click', async () => {
        const outputData = await editor.save();
        console.log('Editor Data:', JSON.stringify(outputData, null, 2));

        $('#editor_json_data').val(JSON.stringify(outputData));

        $('#post-form').submit()


    });
});


class YouTubeEmbed {
    static get toolbox() {
        return {
            title: 'YouTube',
            icon: '<svg width="17" height="15" viewBox="0 0 336 276"><path d="M336 70s-3-25-17-43c-16-20-34-20-42-21-60-5-149-5-149-5s-89 0-149 5c-8 1-26 1-42 21C23 45 20 70 20 70s-3 29-3 88v30c0 59 3 88 3 88s3 25 17 43c16 20 37 21 46 22 33 2 114 4 150 4s117-2 150-4c9-1 30-2 46-22 14-18 17-43 17-43s3-29 3-88v-30c0-59-3-88-3-88zM137 211V98l95 56-95 57z"/></svg>'
        };
    }

    constructor({data, api}) {
        this.data = data;
        this.api = api;
        this.container = document.createElement('div');
        this.container.className = 'youtube-embed';
    }

    render() {
        const input = document.createElement('input');
        input.placeholder = 'Enter YouTube video URL';
        input.value = this.data.url || '';
        input.addEventListener('change', (e) => {
            this.data = {url: e.target.value};
            this.renderVideo();
        });

        this.container.innerHTML = '';
        this.container.appendChild(input);
        if (this.data.url) this.renderVideo();
        this.container.appendChild(input);
        return this.container;
    }

    renderVideo() {
        const videoId = this.extractVideoId(this.data.url);
        if (videoId) {
            const iframe = document.createElement('iframe');
            iframe.src = `https://www.youtube.com/embed/${videoId}`;
            iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
            iframe.allowFullscreen = true;
            this.container.appendChild(iframe);
        }
    }

    extractVideoId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    save() {
        return this.data;
    }

    static get isReadOnlySupported() {
        return true;
    }
}
