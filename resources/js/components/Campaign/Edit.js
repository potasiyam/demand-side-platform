import React, {Component} from 'react';
import ReactDOM from "react-dom";
import Create from "./Create";
import axios from "axios";

class Edit extends Component {
    constructor(props) {
        super(props);
        this.state = {
            campaignId: this.props.campaignId,
            campaign: null,
            noOfFiles: 1,
            formdata: {},
            errors: {},
            errorMessage: null
        }
    }

    componentDidMount() {
        axios.get('/api/campaign/' + this.state.campaignId)
            .then(res => {
                let campaign = res.data.data

                let formdata = {}
                formdata['name'] = campaign['name']
                formdata['start_date'] = campaign['start_date']
                formdata['end_date'] = campaign['end_date']
                formdata['total_budget'] = campaign['total_budget']
                formdata['daily_budget'] = campaign['daily_budget']

                this.setState({
                    campaign,
                    formdata
                })
            })
            .catch(err => {
                window.location = '/'
            })
    }

    updateCampaign = (event) => {
        event.preventDefault()
        let errors = {}
        let errorMessage = null
        this.setState({
            errors,
            errorMessage
        })

        const formData = new FormData();
        for (let key in this.state.formdata) {
            formData.append(key, this.state.formdata[key])
        }

        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        }

        axios.post('/api/campaign/' + this.state.campaignId + '/update', formData, config)
            .then(res => {
                window.location = '/'
            })
            .catch(err => {
                let errors = err.response.data.errors
                let errorMessage = err.response.data.message
                this.setState({
                    errors,
                    errorMessage
                })
            })
    }

    handleChange = (event) => {
        let formdata = {...this.state.formdata}
        if (event.target.type === 'file') {
            formdata[event.target.name] = event.target.files[0]
        } else {
            formdata[event.target.name] = event.target.value
        }
        this.setState({
            formdata
        })
    }

    addMoreFileInput = () => {
        this.setState({
            noOfFiles: this.state.noOfFiles + 1
        })
    }

    render() {
        return (
            <form onSubmit={this.updateCampaign}>
                <div className="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value={this.state.campaign ? this.state.formdata.name : ''}
                           onChange={this.handleChange} className="form-control" required/>
                </div>
                <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Start Date</label>
                    <input type="date" name="start_date"
                           value={this.state.campaign ? this.state.formdata.start_date : ''}
                           onChange={this.handleChange} className="form-control" required/>
                </div>
                <div className="form-group">
                    <label htmlFor="exampleInputEmail1">End Date</label>
                    <input type="date" name="end_date" value={this.state.campaign ? this.state.formdata.end_date : ''}
                           onChange={this.handleChange} className="form-control" required/>
                </div>
                <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Total Budget</label>
                    <input type="number" name="total_budget"
                           value={this.state.campaign ? this.state.formdata.total_budget : ''}
                           onChange={this.handleChange} className="form-control" required/>
                </div>
                <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Daily Budget</label>
                    <input type="number" name="daily_budget"
                           value={this.state.campaign ? this.state.formdata.daily_budget : ''}
                           onChange={this.handleChange} className="form-control" required/>
                </div>
                <div className="form-group">
                    <label className="d-block" htmlFor="exampleInputEmail1">Creatives
                        <button type="button" className="btn btn-sm btn-info rounded-0 float-right"
                                onClick={this.addMoreFileInput}>Add More File</button>
                    </label>
                    {[...Array(this.state.noOfFiles)].map((val, key) => <div className="row mb-3">
                        <div className="col-12" key={'file_input_' + key}>
                            <input type="file" name={'creatives[' + key + ']'} onChange={this.handleChange}
                                   className="form-control"
                            />
                        </div>
                    </div>)}

                </div>
                <button type="submit" className="btn btn-primary rounded-0 mt-2">Update</button>
            </form>
        );
    }
}

export default Edit;

if (document.getElementById('edit-campaign')) {
    let editDom = document.getElementById('edit-campaign');
    ReactDOM.render(<Edit campaignId={editDom.dataset.campaignid}/>, editDom);
}
