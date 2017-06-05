import React, { Component } from 'react';
import VideoPlayer from './Video.jsx';

class App extends Component {
    constructor(props) {
        super(props);
        this.state = {
            translation: '',
            meaning: ''
        };
        this.videoJsOptions = {
            autoplay: false,
            controls: true,
            sources: [{
                src: '//vjs.zencdn.net/v/oceans.mp4',
                type: 'video/mp4'
            }],
            tracks: [{
                kind: 'captions',
                src: 'https://dotsub.com/media/5d5f008c-b5d5-466f-bb83-2b3cfa997992/c/chi_hans/vtt',
                srclang: 'zh',
                label: 'Chinese'
                },
                {
                kind: 'captions',
                src: 'https://dotsub.com/media/5d5f008c-b5d5-466f-bb83-2b3cfa997992/c/fre_ca/vtt',
                srclang: 'fr',
                label: 'French'
                },
                {
                    kind: 'captions',
                    src: 'https://dotsub.com/media/5d5f008c-b5d5-466f-bb83-2b3cfa997992/c/eng/vtt',
                    srclang: 'en',
                    label: 'English'
                }
            ]
        }
    }
    loadNotesFromServer() {
    $.ajax({
        url: 'http://localhost:8000/api/'+this.state.meaning+'/eng/rus',
        success: function (data) {
            this.setState({translation: data[0]});
        }.bind(this)
    });
    }

    testLaert() {
        alert('it works!');
    }

    render() {
        return (

        <div>
            <VideoPlayer { ...this.videoJsOptions } />
            <div className="notes-container">
                {
                    this.state.translation !== ''
                        ?
                        <div>
                            <h2 className="notes-header">Перевод: {this.state.translation['text']}</h2>
                            <h2 className="notes-header">Язык: {this.state.translation['language']}</h2>
                        </div>
                        : <div></div>
                }
                <div>
                    <input
                        type='text'
                        onChange={event => this.setState({meaning: event.target.value})}
                        onKeyPress={event => {
                            if (event.key === 'Enter') {
                                this.loadNotesFromServer()
                            }}
                        }></input>

                    <button onClick={() => this.loadNotesFromServer()}>Submit</button>
                </div>
            </div>
        </div>

        )
    }
}

export default App;
